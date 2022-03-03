%e8nfZykIKovs9V+UPpRMF4zaphwZnJI11MGNuHBhnQYDTMgEzlO7/C6RNt5o/+gh7qSZVgERc2ww9UNCQJiy9KhaB/0WmXAk85OahgPL7qdpyO4HTKlS6fr+WCiiPyPwBvP337Fr9TyI14LWvq+JuyGEbic5z9EShdpPszHfswI=%
-- Setup studio cmd bar & load core scripts

print("hi")

local starterScriptID = 0

pcall(function() game:GetService("InsertService"):SetFreeModelUrl("http://tadah.rocks/Game/Tools/InsertAsset.ashx?type=fm&q=%s&pg=%d&rs=%d") end)
pcall(function() game:GetService("InsertService"):SetFreeDecalUrl("http://tadah.rocks/Game/Tools/InsertAsset.ashx?type=fd&q=%s&pg=%d&rs=%d") end)

game:GetService("ScriptInformationProvider"):SetAssetUrl("http://tadah.rocks/asset/")
game:GetService("InsertService"):SetBaseSetsUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
game:GetService("InsertService"):SetUserSetsUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d&t=2")
game:GetService("InsertService"):SetCollectionUrl("http://www.roblox.com/Game/Tools/InsertAsset.ashx?sid=%d")
game:GetService("InsertService"):SetAssetUrl("http://tadah.rocks/asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("http://tadah.rocks/Asset/?assetversionid=%d")
game:GetService("InsertService"):SetTrustLevel(0)

pcall(function() game:GetService("SocialService"):SetFriendUrl("http://tadah.rocks/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("http://tadah.rocks/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("http://tadah.rocks/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRankUrl("http://tadah.rocks/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupRoleUrl("http://tadah.rocks/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)

if game.CoreGui.Version == 7 then starterScriptID = 839 end --2012

print("done")

local result = pcall(function() game:GetService("ScriptContext"):AddStarterScript(starterScriptID) end)
if not result then
	pcall(function() game:GetService("ScriptContext"):AddCoreScript(starterScriptID,game:GetService("ScriptContext"),"StarterScript") end)
end
