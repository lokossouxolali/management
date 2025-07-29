<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class FixWeakPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:fix-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix users with weak passwords (less than 6 characters)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Checking for users with weak passwords...');
        
        $users = User::all();
        $fixedCount = 0;
        
        foreach ($users as $user) {
            // Vérifier si le mot de passe est trop court
            if (strlen($user->password) < 6) {
                // Générer un nouveau mot de passe sécurisé
                $newPassword = $user->user_type . '_' . strtoupper(substr(md5(uniqid()), 0, 6));
                $user->password = Hash::make($newPassword);
                $user->save();
                
                $this->line("Fixed password for user: {$user->name} ({$user->email})");
                $this->line("New password: {$newPassword}");
                $fixedCount++;
            }
        }
        
        if ($fixedCount > 0) {
            $this->info("Fixed {$fixedCount} users with weak passwords.");
        } else {
            $this->info('No users with weak passwords found.');
        }
        
        return 0;
    }
} 