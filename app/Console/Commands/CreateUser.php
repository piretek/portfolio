<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating user...\n');

        $name = $this->ask('What\'s your name');

        $email = $this->ask('What\'s your email');

        $username = $this->ask('Tell me you username');

        $password = Hash::make($this->secret('Tell me your password'));

        $repeated_password = Hash::make($this->secret('Repeat your password'));

        if ($password === $repeated_password) {
            $this->error('Passwords don\'t match. Try again.');
        }
        else {
            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->name = $name;
            $user->password = $password;

            if( $user->save() ) {
                $this->info('User created!');
            }
            else {
                $this->error('User couldn\'t be created because of the database error.');
            }
        }
    }
}
