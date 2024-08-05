<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function all()
    {
        return view('admin.listuser');
    }
    public function login()
    {
        return view('admin.login');
    }

    //login
    public function postLogin(Request $request)
    {
        $data = $request->only(['email', 'password']);

        //kiểm tra tài khoản có trong csdl ko
        if (Auth::attempt($data)) {
            return redirect()->route('trangchu');
        } else {
            return redirect()->back()->with('errorLogin', 'Email hoặc Password ko chính xác');
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    //register
    public function postRegister(Request $request)
    {
        $data = $request->all();
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $user = Auth::user();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profile updated successfully.');
    }

    public function showChangePasswordForm()
    {
        return view('admin.password');
    }

    // Xử lý việc đổi mật khẩu
    public function changePassword(Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed', // Mật khẩu mới phải khớp với mật khẩu xác nhận
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('password.change')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }

    // public function index()
    // {
    //     $users = User::all(); // Lấy tất cả người dùng
    //     return view('index', compact('users'));
    // }

    // // Phương thức mới để cập nhật trạng thái kích hoạt
    // public function toggleActivation($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->active = !$user->active; // Chuyển trạng thái kích hoạt
    //     $user->save();

    //     return redirect()->route('admin.users.index')->with('success', 'User status updated successfully.');
    // }

    public function dashboard()
    {
        $summary = Phone::select('cate_id', DB::raw('COUNT(*) as total_products'), DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('cate_id')
            ->get();
        return view('admin.dashboard', compact('summary'));
    }

    public function index()
    {
        $phones = Phone::query()->paginate(10);
        return view('admin.phones.listPhone', compact('phones'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.phones.create', compact('categories'));
    }

    //lưu dữ liệu đc thêm vào db
    public function store(StorePhoneRequest $request)
    {
        $data = $request->except('image');
        $data['image'] = "";
        //kiểm tra file
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('avatars');
            $data['image'] = $path_image;
        }
        //lưu data vào db
        Phone::query()->create($data);
        return redirect()->route('phone.index')->with('message', 'Thêm dữ liệu thành công');
    }

    // //xóa
    public function destroy(Phone $phone)
    {
        $phone->delete();
        return redirect()->route('phone.index')->with('message', 'Xóa dữ liệu thành công');
    }

    //hiển thị form edit
    public function editp(Phone $phone)
    {
        $categories = Category::all();
        return view('admin.phones.edit', compact('categories', 'phone'));
    }

    //cập nhật dữ liệu
    public function updatep(Request $request, Phone $phone)
    {
        $data = $request->except('image');
        $old_image = $phone->image;
        //người dùng ko upload ảnh mới
        $data['image'] = $old_image;
        //người dùng upload ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('avatars');
            $data['image'] = $path_image;
        }
        //update
        $phone->update($data);
        //xóa ảnh
        if ($request->hasFile('image')) {
            if (file_exists('store/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
        }
        return redirect()->back()->with('message', "Cập nhật dữ liệu thành công");
    }

    public function cate()
    {
        $categories = Category::query()->paginate(10);
        return view('admin.categories.listCate', compact('categories'));
    }

    public function createc()
    {
        return view('admin.categories.create');
    }

    public function storec(StoreCategoryRequest $request)
    {
        // Lấy dữ liệu đã được xác thực từ request
        $data = $request->validated();

        // Tạo mới một category với dữ liệu
        Category::create($data);

        // Chuyển hướng về danh sách phone và gửi thông báo thành công
        return redirect()->route('cate')->with('message', 'Thêm dữ liệu thành công');
    }

    public function editc(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    //cập nhật dữ liệu
    public function updatec(Request $request, Category $category)
    {
        // Lấy dữ liệu từ request
        $data = $request->only('name'); // Chỉ lấy các trường cần thiết

        // Cập nhật category với dữ liệu mới
        $category->update($data);

        // Chuyển hướng về trang trước và gửi thông báo thành công
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');
    }



    // //xóa
    public function destroyc(Category $category)
    {
        $category->delete();
        return redirect()->route('cate')->with('message', 'Xóa dữ liệu thành công');
    }

    public function alluadmin()
    {
        $users = User::all(); // Lấy tất cả người dùng
        return view('admin.users.listuser', compact('users'));
    }

    // Phương thức mới để cập nhật trạng thái kích hoạt
    public function toggleActivation($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active; // Chuyển trạng thái kích hoạt
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User status updated successfully.');
    }

    public function createu()
    {
        return view('admin.users.create');
    }

    public function storeu(StoreUserRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
    }

    public function editu(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    //cập nhật dữ liệu
    public function updateu(Request $request, User $user)
    {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:user,admin',
            'active' => 'required|boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }


    public function destroyu(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'Xóa dữ liệu thành công');
    }

    public function showChangePasswordForma()
    {
        return view('admin.users.password');
    }

    // Xử lý việc đổi mật khẩu
    public function changePassworda(Request $request)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed', // Mật khẩu mới phải khớp với mật khẩu xác nhận
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // Cập nhật mật khẩu mới
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.password.change')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
