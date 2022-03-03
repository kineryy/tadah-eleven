local a={"Texture","TextureId","SoundId","MeshId","SkyboxUp","SkyboxLf","SkyboxBk","SkyboxRt","SkyboxFt","SkyboxDn","PantsTemplate","ShirtTemplate","Graphic","Image","LinkedSource","AnimationId"}local b={"http://www%.roblox%.com/asset/%?id=","http://www%.roblox%.com/asset%?id=","http://%roblox%.com/asset/%?id=","http://%roblox%.com/asset%?id="}function GetDescendants(c)local d={}function FindChildren(e)for f,g in pairs(e:GetChildren())do table.insert(d,g)FindChildren(g)end end;FindChildren(c)return d end;local h=0;for i,g in pairs(GetDescendants(game))do for f,j in pairs(a)do pcall(function()if g[j]and not g:FindFirstChild(j)then assetText=string.lower(g[j])for f,k in pairs(b)do g[j],matches=string.gsub(assetText,k,"https://assetdelivery%.roblox%.com/v1/asset/%?id=")if matches>0 then h=h+1;print("Replaced "..j.." asset link for "..g.Name)break end end end end)end end;print("DONE! Replaced "..h.." properties")
local ServerPort = {{ $server->port }}

local deathSounds = {
	"http://{{ request()->getHttpHost() }}/audio/cans.mp3"
}

local NetworkServer = game:GetService("NetworkServer")
NetworkServer:Start(ServerPort)

local RunService = game:GetService("RunService")
RunService:Run()

local Players = game:GetService("Players")
Players.PlayerAdded:connect(function(Player)
    Player.CharacterAdded:connect(function(Character)
        local Humanoid = Character:FindFirstChild("Humanoid")
        Humanoid.Died:connect(function()
            wait(5)
            Player:LoadCharacter()
        end)
    end)
	
	Player.Chatted:connect(function(Message)
        if Message == ";ec" or Message == ";reset" or Message == "kys" then
            if Player.Character then
				local Head = Player.Character:FindFirstChild("Head")
				if Head then
					local Sound = Instance.new("Sound", Head)
					Sound.SoundId = deathSounds[math.random(1,#deathSounds)]
					Sound:Play()
				end
				
                Player.Character:BreakJoints()
            end
        end
    end)
end)

NetworkServer.ChildAdded:connect(function(child)
    child.Name = "Connection"
end)

local SitePingerCoro = coroutine.create(function()
    while true do
        game:HttpGet('http://{{ request()->getHttpHost() }}/server/ping/{{ $server->secret }}')
        wait(60)
    end
end)
coroutine.resume(SitePingerCoro)

loadstring('http://{{ request()->getHttpHost() }}/server/admin/{{ $server->secret }}')()