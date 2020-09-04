<?php

namespace App\Http\Controllers\dashboard\individual;

use App\Http\Controllers\Controller;
use App\Models\Hashtag;
use App\models\ItemDetail;
use App\Models\LookHashtag;
use Illuminate\Http\Request;
use App\Models\Look;
use App\models\LookItem;
use App\Repositories\LookRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUpload;

class LookController extends Controller
{
    use ImageUpload;
    private $lookRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LookRepositoryInterface $lookRepository)
    {
        $this->lookRepository = $lookRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.individual.look-upload');
    }

    public function show($id)
    {
        $look = Look::findorfail($id);
        $lookItems = $this->lookRepository->lookItemDetails($id);
        $lookHashTags = LookHashtag::where("look_id", $id)->get();

        return view('dashboard.individual.look-upload')
            ->with('lookItems', $lookItems)
            ->with('look', $look);
//            ->with('lookHashTags', $lookHashTags);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'image'                 => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title'                 => 'required',
                'description'           => 'required',
                'gender'                => 'required',
                'item_information_id'   => 'required',
            ],
            [
                'image.required'                => __('look_upload.image_required'),
                'title.required'                => __('look_upload.title_required'),
                'description.required'          => __('look_upload.description_required'),
                'gender.required'               => __('look_upload.description_required'),
                'item_information_id.required'  => __('look_upload.item_required'),
            ]
        );
        $filePath = $this->userImageUpload($request->image);
        $user_id = Auth::user()->id;
        $look = Look::create([
            'user_id'       => $user_id,
            'title'         => $request->title,
            'description'   => $request->description,
            'gender'        => $request->gender,
            'height'        => $request->height,
            'age'           => $request->age,
            'picture'       => $filePath,
        ]);
        $hashTags = $request->hashTag;
        if (!is_null($hashTags)) {
            foreach ($hashTags as $hashTag) {
                $isExistHashTag = Hashtag::where("name", strtolower($hashTag))->first();
                if ($isExistHashTag === null) {
                    $newHashTag = Hashtag::create([
                        'name'         => $hashTag,
                    ])->id;
                    LookHashtag::updateOrCreate([
                        'look_id' => $look->id,
                        'hashtag_id' => $newHashTag,
                    ]);
                } else {
                    LookHashtag::updateOrCreate([
                        'look_id' => $look->id,
                        'hashtag_id' => $isExistHashTag->id,
                    ]);
                }
            }
        }
        foreach ($request->item_information_id as $item_information_id) {
            LookItem::updateOrCreate([
                'look_id'                       => $look->id,
                'item_detail_information_id'    => $item_information_id,
            ]);
        }

        return redirect()->route('individual.profile', $user_id);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title'                         => 'required',
                'description'                   => 'required',
                'gender'                => 'required',
                'item_information_id'           => 'required',
            ],
            [
                'title.required'                => __('look_upload.title_required'),
                'description.required'          => __('look_upload.intro_required'),
                'gender.required'               => __('look_upload.description_required'),
                'item_information_id.required'  => __('look_upload.item_required')
            ]
        );

        $look = Look::findorfail($id);
        $oldImage = $look->picture;

        if ($request->image && ($oldImage != $request->image)) {
            try {
                $filePath = $this->userImageUpload($request->image);
                $look->picture = $filePath;

                // delete old image
                unlink($oldImage);
            } catch (\Throwable $th) {
            }
        }

        $look->title = $request->title;
        $look->description = $request->description;
        $look->gender = $request->gender;
        $look->height = $request->height;
        $look->age = $request->age;

        // delete all old look item
        LookItem::where('look_id', $id)->delete();
        //delete all old look hash tag
        LookHashtag::where('look_id', $id)->delete();

        $hashTags = $request->hashTag;
        if (!is_null($hashTags)) {
            foreach ($hashTags as $hashTag) {
                $isExistHashTag = Hashtag::where("name", strtolower($hashTag))->first();
                if ($isExistHashTag === null) {
                    $newHashTag = Hashtag::create([
                        'name'         => $hashTag,
                    ])->id;
                    LookHashtag::updateOrCreate([
                        'look_id' => $look->id,
                        'hashtag_id' => $newHashTag,
                    ]);
                } else {
                    LookHashtag::updateOrCreate([
                        'look_id' => $look->id,
                        'hashtag_id' => $isExistHashTag->id,
                    ]);
                }
            }
        }

        foreach ($request->item_information_id as $item_information_id) {
            LookItem::updateOrCreate([
                'look_id'                       => $look->id,
                'item_detail_information_id'    => $item_information_id,
            ]);
        }

        $look->save();
        return redirect()->route('individual.profile', Auth::user()->id);
    }

    // delete item
    public function delete($id)
    {
        $look = Look::findorfail($id);
        LookItem::where('look_id', $id)->delete();
        LookHashtag::where("look_id", $id)->delete();

        unlink($look->picture);
        $look->delete();

        return redirect()->route('individual.profile', Auth::user()->id);
    }
}
