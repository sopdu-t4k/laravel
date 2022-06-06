<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Queries\QueryBuilderUsers;

use App\Models\User;

class UserController extends Controller
{
    public function index(QueryBuilderUsers $users)
    {
        return view('admin.users.index', [
            'title' => trans('title.users.index'),
            'items' => $users->getUsers()
        ]);
    }

    /**
     * Пакетное обновление пользователей
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queries\QueryBuilderUsers  $usersBuilder
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, QueryBuilderUsers $usersBuilder): JsonResponse
    {
        $data = $request->collect();
        $data->transform(fn($item, $key) => ['user_id' => $key, 'is_admin' => $item]);

        try {
            // $admins = $this->splitUsersRole($request->all());
            $notAdmins = $data->where('is_admin', false)->pluck('user_id');
            $admins = $data->where('is_admin', true)->pluck('user_id');
            $usersBuilder->updateIsAdmin($notAdmins->toArray(), false);
            $usersBuilder->updateIsAdmin($admins->toArray(), true);

            // foreach ($admins as $admin => $keys) {
            //     $isAdmin = ($admin === 'is');
            //     $count += $usersBuilder->updateIsAdmin($keys, $isAdmin);
            // }

            return response()->json([
                'success' => trans('message.admin.users.update.success', ['count' => $notAdmins->count() + $admins->count()])
            ]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['danger'=> trans('message.admin.users.update.fail')], 400);
        }
    }

    public function changeIsAdmin(User $user)
    {
        $user->changeIsAdmin();

        return response()->json(['message' => 'Role updated! GG']);
    }

    private function splitUsersRole($users): array
    {
        $admins = [];
        foreach ($users as $id => $isAdmin) {
            if ($isAdmin) {
                $admins['is'][] = $id;
            } else {
                $admins['not'][] = $id;
            }
        }
        return $admins;
    }
}
