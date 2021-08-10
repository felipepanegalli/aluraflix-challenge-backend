<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'titulo' => 'JUNGLE CRUISE',
                'descricao' => 'Jungle Cruise gira ao redor do malandro e brincalhão Frank Wolff (Dwayne Johnson), capitão do barco La Guilla. Ele é contratado pela Dra. Lily Houghton (Emily Blunt) e seu irmão McGregor (Jack Whitehall) para levá-los em uma missão pelas densas florestas amazônicas com a intenção de encontrar uma misteriosa árvore com poderes de cura que poderá mudar para sempre o futuro da medicina. No caminho, eles viverão inúmeros perigos, enfrentando animais selvagens e até mesmo forças sobrenaturais.',
                'url' => 'https://www.adorocinema.com/filmes/filme-57197/',
                'categoriaId' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'titulo' => 'DUPLA EXPLOSIVA 2 - E A PRIMEIRA DAMA DO CRIME',
                'descricao' => 'Em Dupla Explosiva 2 - E a Primeira Dama do Crime, o guarda-costas Michael Bryce (Ryan Reynolds) terá que abandonar sua licença sabática para proteger Darius (Samuel L. Jackson) e Sonia (Salma Hayek), o casal estranho mais letal do mundo. Enquanto Bryce é levado ao limite por seus dois protegidos, o casal Kincaid se mete em uma trama global, onde são perseguidos por Aristotle Papadopolous (Antonio Banderas), um louco vingativo e poderoso',
                'url' => 'https://www.adorocinema.com/filmes/filme-264612/',
                'categoriaId' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'titulo' => 'VELOZES & FURIOSOS 9',
                'descricao' => 'Em Velozes & Furiosos 9, Dominic Toretto (Vin Diesel) e Letty (Michelle Rodriguez) vivem uma vida pacata ao lado de seu filho Brian. Mas eles logo são ameaçados pelo passado de Dom: seu irmão desaparecido Jakob (John Cena). Trata-se de um assassino habilidoso e motorista excelente, que está trabalhando ao lado de Cipher (Charlize Theron), vilã de Velozes & Furiosos 8. Para enfrentá-los, Toretto vai precisar reunir sua equipe novamente, inclusive Han (Sung Kang), que todos acreditavam estar morto.',
                'url' => 'https://www.adorocinema.com/filmes/filme-221542/',
                'categoriaId' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        DB::table('videos')->insert($data);
    }
}
