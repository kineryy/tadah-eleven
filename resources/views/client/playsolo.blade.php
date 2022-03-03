%ZAhRSnnAub7257XTr2+RQULLqh6Bw12qTYVls7GCLl4Ujyc6qx2eignDaSvkh4naoECaOQUC8NmCd2dDmkVY9muNMxK83q2k8jrk9pfXUZRLt6iHNziCL48v9DTvnfVrtj4RP1LJjY5MVouOFZaRDq15OgEfJjwsfPvaamrnRFs=%
local runService = game:GetService("RunService")
local players = game:GetService("Players")

local player = players:CreateLocalPlayer(0)

player.CharacterAdded:connect(function(character)
    repeat wait() until character:FindFirstChild("Humanoid")
    local humanoid = character:FindFirstChild("Humanoid")

    humanoid.Died:connect(function()
        wait(5)
        player:LoadCharacter()
    end)
end)

runService:Run()
player:LoadCharacter()