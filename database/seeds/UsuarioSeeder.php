<?php

use Illuminate\Database\Seeder;
use App\User;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=> bCrypt('123456')
        ];

        if(User::where('email','=',$dados['email'])->count()){
            $usuario = User::where('email','=',$dados['email'])->first();
            $usuario->update($dados);
            echo "Usuário admin atualizado";
        }else{
            User::create($dados);
            echo "usuario admin criado";
        }
    }
}
