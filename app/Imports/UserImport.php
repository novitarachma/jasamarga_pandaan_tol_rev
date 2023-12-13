<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Karyawan;
use App\Models\UserDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = User::create([
                'name' => $row['name'],
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);
            $user->assignRole('user');
            
            Karyawan::create([
                'user_id' => $user->id,
                'nip' => $row['username'],
            ]);

            UserDetail::create([
                'user_id' => $user->id,
            ]);
        }
    }
}