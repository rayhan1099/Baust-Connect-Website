<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AppAdminCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new_admin {id} {password} {name} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the initial admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->createAdmin($this->arguments());
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function createAdmin($options = null)
    {
        if (Admin::count() > 0){
            $this->error("Failed to create admin. Reason: At least one admin exist already!");
            return -1;
        }
        $def = [
            'uni_per_id'=>$options['id'],
            'full_name'=>$options['name'],
            'password'=>Hash::make($options['password']),
            'email'=>$options['email'],
            'level'=>'S',
            'profile_picture'=>'none',
            'email_verified_at'=>'2022-05-28 13:22:30'
        ];
        try {
            Admin::create($def);
        }catch (\Exception $e){
            $this->error("Failed to create admin. Reason: {$e->getMessage()}");
            return -1;
        }
    }
}
