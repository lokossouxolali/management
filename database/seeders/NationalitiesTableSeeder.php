<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Remplit la table des nationalités avec des données en français.
     *
     * @return void
     */
    public function run()
    {
        // Vide la table des nationalités avant d'insérer
        DB::table('nationalities')->delete();

        // Liste des nationalités traduites en français
        $nationalites = [
            'Afghane', 'Albanaise', 'Algérienne', 'Allemande', 'Américaine',
            'Andorrane', 'Angolaise', 'Argentine', 'Arménienne', 'Australienne',
            'Autrichienne', 'Azerbaïdjanaise', 'Bahreïnienne', 'Bangladaise',
            'Barbadienne', 'Belge', 'Béninoise', 'Bhoutanaise', 'Biélorusse',
            'Birmane', 'Bolivienne', 'Bosnienne', 'Botswanaise', 'Brésilienne',
            'Britannique', 'Brunéienne', 'Bulgare', 'Burkinabè', 'Burundaise',
            'Cambodgienne', 'Camerounaise', 'Canadienne', 'Cap-verdienne',
            'Centrafricaine', 'Chilienne', 'Chinoise', 'Chypriote', 'Colombienne',
            'Comorienne', 'Congolaise (RDC)', 'Congolaise (RC)', 'Costaricaine',
            'Croate', 'Cubaine', 'Danoise', 'Djiboutienne', 'Dominicaine',
            'Égyptienne', 'Émiratie', 'Équato-guinéenne', 'Équatorienne',
            'Érythréenne', 'Espagnole', 'Estonienne', 'Éthiopienne', 'Finlandaise',
            'Française', 'Gabonaise', 'Gambienne', 'Géorgienne', 'Ghanéenne',
            'Grecque', 'Grenadienne', 'Guatémaltèque', 'Guinéenne',
            'Guinéenne-Bissau', 'Guyanienne', 'Haïtienne', 'Hondurienne',
            'Hongroise', 'Indienne', 'Indonésienne', 'Irakienne', 'Iranienne',
            'Irlandaise', 'Islandaise', 'Israélienne', 'Italienne', 'Ivoirienne',
            'Jamaïcaine', 'Japonaise', 'Jordanienne', 'Kazakhstanaise', 'Kenyane',
            'Kirghize', 'Kiribatienne', 'Koweïtienne', 'Laotienne', 'Lesothane',
            'Lettonne', 'Libanaise', 'Libérienne', 'Libyenne', 'Liechtensteinoise',
            'Lituanienne', 'Luxembourgeoise', 'Macédonienne', 'Malaisienne',
            'Malawienne', 'Maldivienne', 'Malienne', 'Maltaise', 'Marocaine',
            'Mauricienne', 'Mauritanienne', 'Mexicaine', 'Micronésienne',
            'Moldave', 'Monégasque', 'Mongole', 'Monténégrine', 'Mozambicaine',
            'Namibienne', 'Nauruane', 'Népalaise', 'Néerlandaise', 'Néo-Zélandaise',
            'Nicaraguayenne', 'Nigériane', 'Nigérienne', 'Norvégienne',
            'Omanaise', 'Ougandaise', 'Ouzbèke', 'Pakistanaise', 'Palaosienne',
            'Palestinienne', 'Panaméenne', 'Papouasienne', 'Paraguayenne',
            'Péruvienne', 'Philippine', 'Polonaise', 'Portugaise', 'Qatarienne',
            'Roumaine', 'Russe', 'Rwandaise', 'Saint-Lucienne', 'Salomonaise',
            'Salvadorienne', 'Samoane', 'Saoudienne', 'Sénégalaise', 'Serbe',
            'Seychelloise', 'Sierra-Léonaise', 'Singapourienne', 'Slovaque',
            'Slovène', 'Somalienne', 'Soudanaise', 'Sri Lankaise', 'Suédoise',
            'Suisse', 'Surinamaise', 'Swazie', 'Syrienne', 'Tadjike', 'Tanzanienne',
            'Tchadienne', 'Tchèque', 'Thaïlandaise', 'Timoraise', 'Togolaise',
            'Tonguienne', 'Trinidadienne', 'Tunisienne', 'Turkmène', 'Turque',
            'Tuvaluane', 'Ukrainienne', 'Uruguayenne', 'Vanuataise', 'Vénézuélienne',
            'Vietnamienne', 'Yéménite', 'Zambienne', 'Zimbabwéenne'
        ];

        // Insertion des données
        foreach ($nationalites as $nom) {
            Nationality::create(['name' => $nom]);
        }
    }
}
