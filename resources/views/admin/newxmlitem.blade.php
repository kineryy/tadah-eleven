@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('title')
New XML Asset
@endsection

@section('content')
<div class="container">
    <h1><b>New XML Asset</b></h1>
    <p>Create a new XML asset on Tadah.</p>
    <hr>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.createxmlitem') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" class="form-control" id="itemname" placeholder="Item Name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label for="xml">XML Data</label>
            <textarea name="xml" class="form-control" id="xml" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="robloxid">Roblox ID - <button class="btn btn-sm btn-secondary" type="button" id="robloxItemInfo">Get item info</button></label>
            <input type="number" name="robloxid" class="form-control" id="robloxid" placeholder="Roblox Asset ID">
        </div>

        <div class="form-group">
            <label for="robloxversion">Roblox Version</label>
            <input type="number" name="robloxversion" class="form-control" id="robloxversion" placeholder="Roblox Version" value="1">
        </div>

        <div class="form-group">
            <label for="thumbnailurl">Thumbnail URL</label>
            <input type="text" name="thumbnailurl" class="form-control" id="thumbnailurl" placeholder="Thumbnail URL">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option>Hat</option>
                <option>Gear</option>
                <option>Head</option>
                <option>Package</option>
                <option>Model</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="Price">
        </div>
        
        <button type="submit" class="btn btn-success">Create XML Asset</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $('#robloxItemInfo').click(function(event) {
        $.ajax({
            type: "GET",
            url: "/admin/robloxitemdata/" + $('#robloxid').val(),
            dataType: "json",
            success: function (data) {
                $("#itemname").val(data["Name"]);
                $("#description").text(data["Description"]);
                $("#thumbnailurl").val("https://www.roblox.com/Thumbs/Asset.ashx?width=420&height=420&assetId=" + $('#robloxid').val());
            }
        });

        $.ajax({
            type: "GET",
            url: "/admin/robloxxmldata/" + $('#robloxid').val() + "/" + $('#robloxversion').val(),
            success: function (data){
                $("#xml").html(data.replaceAll("http://www.roblox.com/asset", "https://assetdelivery.roblox.com/v1/asset").replaceAll("class=\"Accessory\"", "class=\"Hat\""));
            }
        });
    });
</script>
@endsection