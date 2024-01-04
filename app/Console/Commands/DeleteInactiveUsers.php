<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive_users {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to delete inactive users
                              If a user needs to be exclused, pass their email
                              Format delete:inactive_users email_id';

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
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        //dd($name);
        $usersWithStatus = User::where("status",0)->where("email","!=",$email)->get();

        if ($usersWithStatus->isEmpty()) {
            $this->info('No users found with the specified status.');
        } else {
            $this->info('Users with status 0:');
            foreach($usersWithStatus as $user)
            {
            $this->line("User id {$user->id}, name {$user->name}, email {$user->email} ");
            $user->delete();
            }
        }
       // User::where("status",0)->delete();
        /*name = $this->ask("What is your name?");
        $password = $this->secret("What is your passowrd?");
        $gender = $this->anticipate('Gender?', ['Female','Male']);
        $this->info('Users details:-');
        $this->line("User {$name}, Gender {$gender}");*/
    }
}
