<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Queries\QueryBuilderUsers;
use Illuminate\Http\JsonResponse;

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
     * @param  \App\Queries\QueryBuilderUsers  $users
     * @return \Illuminate\Http\JsonResponse;
     */
    public function update(Request $request, QueryBuilderUsers $users): JsonResponse
    {
        try {
            $admins = $this->splitUsersRole($request->all());
            $count = 0;

            foreach ($admins as $admin => $keys) {
                $isAdmin = ($admin === 'is');
                $count += $users->updateIsAdmin($keys, $isAdmin);
            }

            return response()->json([
                'success' => trans('message.admin.users.update.success', ['count' => $count])
            ]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['danger'=> trans('message.admin.users.update.fail')], 400);
        }
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
