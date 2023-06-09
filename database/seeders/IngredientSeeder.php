<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // foreach ($ing as $i) {
            $chickenIngredients = [
                'chicken breast',
                'chicken thighs',
                'chicken wings',
                'ground chicken',
                'boneless chicken',
                'chicken drumsticks',
                'chicken tenderloins',
                'chicken stock',
                'chicken broth',
                'chicken bouillon',
                'chicken liver',
                'chicken gizzards',
                'chicken sausage',
                'chicken bacon',
                'chicken ham',
                'chicken stock cubes',
                'chicken seasoning',
                'chicken marinade',
                'chicken rub',
                'chicken coating',
                'chicken cutlets',
                'chicken legs',
                'chicken mince',
                'chicken tenders',
                'chicken nuggets',
                'chicken kebabs',
                'chicken kabobs',
                'chicken fajitas',
                'chicken stir-fry',
                'chicken curry',
                'chicken tikka',
                'chicken shawarma',
                'chicken piccata',
                'chicken cordon bleu',
                'chicken parmigiana',
                'chicken satay',
                'chicken katsu',
                'chicken pot pie',
                'chicken noodle soup',
                'chicken salad',
                'chicken Caesar salad',
                'chicken wrap',
                'chicken quesadilla',
                'chicken enchiladas',
                'chicken tacos',
                'chicken burrito',
                'chicken biryani',
                'chicken fried rice',
                'chicken teriyaki',
                'chicken alfredo',
                'chicken pesto',
                'chicken carbonara',
                'chicken curry',
                'chicken chili',
                'chicken fajitas',
                'chicken adobo',
                'chicken vindaloo',
                'chicken tikka masala',
                'chicken tandoori',
                'chicken souvlaki',
                'chicken gyros',
                'chicken keema',
                'chicken schnitzel',
                'chicken paella',
                'chicken mole',
                'chicken tostadas',
                'chicken tamales',
            ];
            $beefIngredients = [
                'beef steak',
                'ground beef',
                'beef roast',
                'beef ribs',
                'beef tenderloin',
                'beef brisket',
                'beef stew meat',
                'beef liver',
                'beef sausage',
                'beef bacon',
                'beef jerky',
                'beef bouillon',
                'beef stock',
                'beef broth',
                'beef bones',
                'beef shank',
                'beef chuck',
                'beef flank steak',
                'beef short ribs',
                'beef tongue',
                'beef heart',
                'beef tripe',
                'beef sirloin',
                'beef strip loin',
                'beef oxtail',
                'beef knuckle',
                'beef suet',
                'beef tallow',
                'beef cheek',
                'beef eye of round',
                'beef skirt steak',
                'beef filet mignon',
                'beef ground chuck',
                'beef ground sirloin',
                'beef ground round',
                'beef pastrami',
                'beef corned beef',
                'beef hot dogs',
                'beef liverwurst',
                'beef kielbasa',
                'beef pepperoni',
                'beef salami',
                'beef summer sausage',
            ];
            $porkIngredients = [
                'Pork loin',
                'Pork shoulder',
                'Pork belly',
                'Pork chops',
                'Pork ribs',
                'Ground pork',
                'Pork sausage',
                'Bacon',
                'Ham',
                'Pork tenderloin',
                'Pork hocks',
                'Pork liver',
                'Pork kidneys',
                'Pork fatback',
                'Pork cracklings',
                'Pork stock/broth',
                'Pork bouillon cubes',
                'Pork rinds',
                'Pork pâté',
                'Pork lard',
                'Pork bones',
                'Pork mince',
                'Pork ham hocks',
                'Pork chorizo',
                'Pork salami',
                'Pork pancetta',
                'Pork prosciutto',
                'Pork guanciale',
                'Pork trotters',
                'Pork tail',
                'Pork heart',
                'Pork tongue',
                'Pork jowl',
                'Pork snout',
                'Pork ears',
                'Pork blood',
                'Pork tripe',
                'Pork intestine',
                'Pork cheeks',
                'Pork shoulder roast',
                'Pork sirloin',
                'Pork neck',
                'Pork leg',
                'Pork shank',
                'Pork tenderloin medallions',
                'Pork stew meat',
                'Pork caul fat',
                'Pork spare ribs',
                'Pork back ribs',
                'Pork loin roast',
                'Pork blade roast',
                'Pork country-style ribs',
                'Pork sausage links',
                'Pork sausage patties',
                'Pork hot dogs',
                'Pork bratwurst',
                'Pork andouille sausage',
                'Pork kielbasa',
                'Pork liverwurst',
                'Pork bologna',
                'Pork mortadella',
                'Pork head cheese',
                'Pork black pudding',
                'Pork white pudding',
                'Pork blood sausage',
                'Pork liver sausage',
                'Pork cotechino',
                'Pork salchichón',
                'Pork soppressata',
                'Pork capicola',
                'Pork culatello',
                'Pork coppa',
                'Pork lardo',
                'Pork bacon bits',
                'Pork crackling crumbs',
                'Pork broth concentrate',
                'Pork demi-glace',
                'Pork gelatin',
                'Pork brawn',
                'Pork bone meal',
            ];
            $lambIngredients = [
                'Lamb leg',
                'Lamb shoulder',
                'Lamb chops',
                'Lamb rack',
                'Lamb shank',
                'Ground lamb',
                'Lamb liver',
                'Lamb kidneys',
                'Lamb heart',
                'Lamb tongue',
                'Lamb sweetbreads',
                'Lamb bones',
                'Lamb fat',
                'Lamb broth',
                'Lamb stock',
                'Lamb sausage',
                'Lamb merguez',
                'Lamb sujuk',
                'Lamb prosciutto',
                'Lamb bacon',
                'Lamb casings',
                'Lamb caul fat',
                'Lamb suet',
                'Lamb offal (variety of organ meats)',
                'Lamb tenderloin',
                'Lamb neck',
                'Lamb belly',
                'Lamb loin',
                'Lamb riblets',
                'Lamb tongue',
                'Lamb trotters',
                'Lamb testicles',
                'Lamb cheeks',
                'Lamb tail',
                'Lamb blood',
                'Lamb tripe',
                'Lamb shoulder blade chops',
                'Lamb rib chops',
                'Lamb sirloin chops',
                'Lamb loin chops',
                'Lamb breast',
                'Lamb caul',
                'Lamb caul fat',
                'Lamb tongue',
                'Lamb kidney fat',
                'Lamb liver',
                'Lamb heart',
                'Lamb brain',
                'Lamb sweetbreads',
                'Lamb bone marrow',
                'Lamb suet',
                'Lamb caul fat',
                'Lamb oxtail',
                'Lamb tail fat',
                'Lamb fatback'
            ];
            $fishIngredients = [
                "Salmon",
                "Tuna",
                "Cod",
                "Haddock",
                "Halibut",
                "Trout",
                "Sardines",
                "Mackerel",
                "Snapper",
                "Mahi Mahi",
                "Barramundi",
                "Swordfish",
                "Grouper",
                "Catfish",
                "Tilapia",
                "Perch",
                "Flounder",
                "Rainbow trout",
                "Arctic char",
                "Anchovies",
                "Whitefish",
                "Pike",
                "Red snapper",
                "Sole",
                "Carp",
                "Basa",
                "Mullet",
                "Tilefish",
                "Rockfish",
                "Pollock",
                "Cobia",
                "Wahoo",
                "Monkfish",
                "Lingcod",
                "Opah",
                "Amberjack",
                "Red drum",
                "Bream",
                "Butterfish",
                "Pompano",
                "Spanish mackerel",
                "Triggerfish",
                "Wrasse",
                "Parrotfish",
                "Grenadier",
                "Jackfish",
                "Periwinkle",
                "Surimi",
                "Eel",
                "Octopus",
                "Squid",
                "Cuttlefish",
                "Clams",
                "Mussels",
                "Oysters",
                "Scallops",
                "Shrimp",
                "Prawns",
                "Crab",
                "Lobster",
                "Crayfish",
                "Caviar",
                "Roe"
            ];


            foreach ($chickenIngredients as $name) {
                Ingredients::create(['name' => $name]);
            }
            foreach ($beefIngredients as $name) {
                Ingredients::create(['name' => $name]);
            }
            foreach ($porkIngredients as $name) {
                Ingredients::create(['name' => $name]);
            }
            foreach ($lambIngredients as $name) {
                Ingredients::create(['name' => $name]);
            }
            foreach ($fishIngredients as $name) {
                Ingredients::create(['name' => $name]);
            }
    }
}
