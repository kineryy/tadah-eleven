<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BodyColors;

class BodyColorsController extends Controller
{
    public $colors = [
        ["name" => "Light blue", "id" => "45", "rgb" => "180,210,228"],
        ["name" => "Pastel light blue", "id" => "1024", "rgb" => "175,221,255"],
        ["name" => "Pastel Blue", "id" => "11", "rgb" => "128,187,219"],
        ["name" => "Medium blue", "id" => "102", "rgb" => "110,153,202"],
        ["name" => "Bright blue", "id" => "23", "rgb" => "13,105,172"],
        ["name" => "Really blue", "id" => "1010", "rgb" => "0,0,255"],
        ["name" => "Deep blue", "id" => "1012", "rgb" => "33,84,185"],
        ["name" => "Navy blue", "id" => "1011", "rgb" => "0,32,96"],
        ["name" => "Pastel blue-green", "id" => "1027", "rgb" => "159,243,233"],
        ["name" => "Teal", "id" => "1018", "rgb" => "18,238,212"],
        ["name" => "Sand green", "id" => "151", "rgb" => "120,144,130"],
        ["name" => "Grime", "id" => "1022", "rgb" => "127,142,100"],
        ["name" => "Sand blue", "id" => "135", "rgb" => "116,134,157"],
        ["name" => "Toothpaste", "id" => "1019", "rgb" => "0,255,255"],
        ["name" => "Cyan", "id" => "1013", "rgb" => "4,175,236"],
        ["name" => "Bright bluish green", "id" => "107", "rgb" => "0,143,156"],
        ["name" => "Pastel green", "id" => "1028", "rgb" => "204,255,204"],
        ["name" => "Medium green", "id" => "29", "rgb" => "161,196,140"],
        ["name" => "Br. yellowish green", "id" => "119", "rgb" => "164,189,71"],
        ["name" => "Bright green", "id" => "37", "rgb" => "75,151,75"],
        ["name" => "Camo", "id" => "1021", "rgb" => "58,125,21"],
        ["name" => "Lime green", "id" => "1020", "rgb" => "58,125,21"],
        ["name" => "Dark green", "id" => "28", "rgb" => "40,127,71"],
        ["name" => "Earth green", "id" => "141", "rgb" => "39,70,45"],
        ["name" => "Pastel yellow", "id" => "1029", "rgb" => "255,255,204"],
        ["name" => "Cool yellow", "id" => "226", "rgb" => "253,234,141"],
        ["name" => "Olive", "id" => "1008", "rgb" => "193,190,66"],
        ["name" => "Bright yellow", "id" => "24", "rgb" => "245,205,48"],
        ["name" => "Deep orange", "id" => "1017", "rgb" => "255,175,0"],
        ["name" => "New Yeller", "id" => "1009", "rgb" => "255,255,0"],
        ["name" => "Deep orange", "id" => "1005", "rgb" => "255,176,0"],
        ["name" => "Br. yellowish orange", "id" => "105", "rgb" => "226,155,64"],
        ["name" => "Pastel orange", "id" => "1025", "rgb" => "255,201,201"],
        ["name" => "Light orange", "id" => "125", "rgb" => "234,184,146"],
        ["name" => "Medium red", "id" => "101", "rgb" => "218,134,122"],
        ["name" => "Dusty Rose", "id" => "1007", "rgb" => "163,75,75"],
        ["name" => "Olive", "id" => "1016", "rgb" => "193,190,66"],
        ["name" => "Hot pink", "id" => "1032", "rgb" => "255,0,191"],
        ["name" => "Really red", "id" => "1004", "rgb" => "255,0,0"],
        ["name" => "Bright red", "id" => "21", "rgb" => "196,40,28"],
        ["name" => "Light reddish violet", "id" => "9", "rgb" => "232,186,200"],
        ["name" => "Pastel violet", "id" => "1026", "rgb" => "177,167,255"],
        ["name" => "Alder", "id" => "1006", "rgb" => "180,128,255"],
        ["name" => "Sand red", "id" => "153", "rgb" => "149,121,119"],
        ["name" => "Lavender", "id" => "1023", "rgb" => "140,91,159"],
        ["name" => "Magenta", "id" => "1015", "rgb" => "170,0,170"],
        ["name" => "Royal purple", "id" => "1031", "rgb" => "98,37,209"],
        ["name" => "Bright violet", "id" => "104", "rgb" => "107,50,124"],
        ["name" => "Brick yellow", "id" => "5", "rgb" => "215,197,154"],
        ["name" => "Pastel brown", "id" => "1030", "rgb" => "255,204,153"],
        ["name" => "Nougat", "id" => "18", "rgb" => "204,142,105"],
        ["name" => "Bright orange", "id" => "106", "rgb" => "218,133,65"],
        ["name" => "Dark orange", "id" => "38", "rgb" => "160,95,53"],
        ["name" => "CGA brown", "id" => "1014", "rgb" => "170,85,0"],
        ["name" => "Brown", "id" => "217", "rgb" => "124,92,70"],
        ["name" => "Reddish brown", "id" => "192", "rgb" => "105,64,40"],
        ["name" => "Institutional white", "id" => "1001", "rgb" => "248,248,248"],
        ["name" => "White", "id" => "1", "rgb" => "242,243,243"],
        ["name" => "Light stone grey", "id" => "208", "rgb" => "229,228,223"],
        ["name" => "Mid gray", "id" => "1002", "rgb" => "205,205,205"],
        ["name" => "Medium stone grey", "id" => "194", "rgb" => "163,162,165"],
        ["name" => "Dark stone grey", "id" => "199", "rgb" => "99,95,98"],
        ["name" => "Black", "id" => "26", "rgb" => "27,42,53"],
        ["name" => "Really black", "id" => "1003", "rgb" => "17,17,17"]
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function characterBodyColors(Request $request)
    {
        $bodyColors = BodyColors::where('user_id', $request->user()->id)->firstOrFail();

        return view('users.charactercolors')->with(['colors' => $bodyColors, 'codes' => $this->colors, 'type' => null]);
    }

    public function changeBodyColor(Request $request) {
		$colors = BodyColors::where('user_id', $request->user()->id)->firstOrFail();

        if (!$request->color) {
			abort(500);
		}

		if (!$request->part) {
			abort(500);
		}

		if (!$this->colors[array_search($request->color, array_column($this->colors, 'id'))]) {
			abort(403);
		}

        switch ($request->part) {
            default:
                abort(500);
            case "head":
                $colors->head_color = $request->color;
                break;
            case "torso":
                $colors->torso_color = $request->color;
                break;
            case "leftarm":
                $colors->left_arm_color = $request->color;
                break;
            case "leftleg":
                $colors->left_leg_color = $request->color;
                break;
            case "rightarm":
                $colors->right_arm_color = $request->color;
                break;
            case "rightleg":
                $colors->right_leg_color = $request->color;
                break;
        }

        $colors->save();

		if ($colors) {
			return $this->colors[array_search($request->color, array_column($this->colors, 'id'))]['rgb'];
		}
		
		return abort(500);
	}
}
