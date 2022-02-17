<?php


namespace JoulesLabs\IllumineAdmin\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JoulesLabs\IllumineAdmin\Enum\Admin\UserStatus;
use Nahid\Permit\Facades\Permit;
use Nahid\Permit\Roles\Role;

class UserController extends Controller
{
    public function __construct(
        // protected UserService $user
    ){}

    public function index(): View
    {
        auth_admin()->allows('user.list');

        $users = config('illumineadmin.users.model')::select('id', 'name', 'email')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    // public function changePassword(): View
    // {
    //     return view('admin.users.change_password');
    // }

    // public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    // {
    //     /* @phpstan-ignore-next-line */
    //     if (!Hash::check($request->input('current_password'), auth_admin()->password)) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => 'You are not authorized to change the password!'
    //         ]);
    //     }

    //     /* @phpstan-ignore-next-line */
    //     auth_admin()->password = $request->input('new_password');

    //     /* @phpstan-ignore-next-line */
    //     if (!auth_admin()->save()) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => 'Unable to save the data!'
    //         ]);
    //     }

    //     return redirect()->back()->with([
    //         '_status' => 'success',
    //         '_msg' => 'Successfully changed password!'
    //     ]);
    // }

    public function create(Request $request): View
    {
        auth_admin()->allows('user.create');

        $roles = Role::all();

        return view('admin.users.create',  compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        auth_admin()->allows('user.create');

        $this->validate($request, [
            'email' => ['required', 'email', 'unique:users,email'],
            'name' => ['required'],
            'password' => ['required'],
            // 'primary_location' => ['required'],
            // 'type' => ['integer'],
        ]);

        $user = new (config('illumineadmin.users.model'))();
        $inputs = $request->all();
        $inputs['status'] = UserStatus::ACTIVE();

        $user->fill($inputs);

        if ($user->save()) {
            $user->roles()->sync($request->input('roles'));
        }

        return redirect()->back()->with([
            '_status' => 'success',
            '_msg' => 'Successfully Added User!'
        ]);
    }


    public function edit(string $id): View
    {
        auth_admin()->allows('user.update');

        $user = config('illumineadmin.users.model')::findOrFail((int) $id);
        $roles = Role::all();
        $abilities = Permit::getAbilities();

        return view('admin.users.edit',  compact('roles', 'user', 'abilities'));
    }

    // /**
    //  * @return View
    //  */
    // public function profile(): View
    // {

    //     auth_admin()->allows('user.view');

    //     $user = auth_admin();

    //     return view('admin.users.profile' ,  compact('user'));
    // }

    public function update(string $id, Request $request): RedirectResponse
    {
        auth_admin()->allows('user.update');

        $this->validate($request, [
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'name' => ['required'],
            // 'primary_location' => ['required']
        ]);

        // $user = $this->user->find((int) $id); //Not using service class for package
        $user = config('illumineadmin.users.model')::findOrFail((int) $id);

        $user->fill($request->all());

        if ($user->save()) {
            $user->roles()->sync($request->input('roles'));

            return redirect()->back()->with([
                '_status' => 'success',
                '_msg' => 'Successfully Updated User'
            ]);
        }

        return redirect()->back()->with([
            '_status' => 'error',
            '_msg' => 'Unable to update!'
        ]);
    }

    // public function disable(string $userId): RedirectResponse
    // {
    //     auth_admin()->allows('user.update');

    //     try {
    //         $data = [
    //             'status' => UserStatus::INACTIVE()
    //         ];

    //         $this->user->updateById((int) $userId, $data);

    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => 'Unable to disable the user!'
    //         ]);
    //     }

    //     return redirect()->back()->with([
    //         '_status' => 'success',
    //         '_msg' => 'Successfully disabled user!'
    //     ]);
    // }

    // public function banned(string $userId): RedirectResponse
    // {
    //     auth_admin()->allows('user.update');

    //     try {
    //         $data = [
    //             'status' => UserStatus::BANNED()
    //         ];

    //         $this->user->updateById((int) $userId, $data);

    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => 'Unable to banned the user!'
    //         ]);
    //     }

    //     return redirect()->back()->with([
    //         '_status' => 'success',
    //         '_msg' => 'Successfully banned user!'
    //     ]);
    // }

    // public function enable(string $userId): RedirectResponse
    // {
    //     auth_admin()->allows('user.update');

    //     try {
    //         $data = [
    //             'status' => UserStatus::ACTIVE()
    //         ];

    //         $this->user->updateById((int) $userId, $data);

    //     } catch (\Exception $exception) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => 'Unable to enable the user!'
    //         ]);
    //     }

    //     return redirect()->back()->with([
    //         '_status' => 'success',
    //         '_msg' => 'Successfully enabled user!'
    //     ]);
    // }

    // /**
    //  * @param string $id
    //  * @return RedirectResponse
    //  */
    // public function forgetPassword(string $id): RedirectResponse
    // {
    //     auth_admin()->allows('user.reset_password');

    //     try {
    //         $user = $this->user->find((int) $id);

    //         $newPassword = random_int(100000, 999999);

    //         $this->user->updatePassword($user, $newPassword);

    //         event(new EmailUserEvent($user, $newPassword));
    //     }
    //     catch (\Exception $exception) {
    //         return redirect()->back()->with([
    //             '_status' => 'error',
    //             '_msg' => $exception->getMessage() ?: 'Unable to reset user password!'
    //         ]);
    //     }

    //     return redirect()->back()->with([
    //         '_status' => 'success',
    //         '_msg' => 'Successfully resend password on user mail !'
    //     ]);
    // }

}
