<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tools;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toolHubble = Tools::where('name', '=', 'hubble')->first();
        if (! $toolHubble) {
            $hubbledata = [
                'name' => 'hubble'
            ];
            $tool = Tools::create($hubbledata);

            echo 'Tool Hubble added successfully!';
        } else {
            echo 'Tool Hubble already exists!';
        }

        $toolLumeire = Tools::where('name', '=', 'lumeire')->first();
        if (!$toolLumeire) {
            $lumeireData = [
                'name' => 'lumeire'
            ];
            $toolLumeire = Tools::create($lumeireData);

            echo 'Tool Lumeire added successfully!';
        } else {
            echo 'Tool Lumeire already exists!';
        }

        $toolCLG = Tools::where('name', '=', 'clg')->first();
        if (!$toolCLG) {
            $toolCLGData = [
                'name' => 'clg'
            ];
            $toolCLG = Tools::create($toolCLGData);

            echo 'Tool CLG added successfully!';
        } else {
            echo 'Tool CLG already exists!';
        }

        
    }
}
