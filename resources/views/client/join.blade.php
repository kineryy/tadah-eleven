local PlayerName = "{{ $token->user->username }}"
local CharacterAppearance = "http://{{ request()->getHttpHost() }}/users/{{ $token->user->id }}/character?tick=" .. tick()
local ServerAddress = "{{ $token->server->ip }}"
local ServerPort = {{ $token->server->port }}

local Players = game:GetService("Players")
Players:SetChatStyle(Enum.ChatStyle.ClassicAndBubble)

local Player = Players:CreateLocalPlayer({{ $token->user->id }})
Player.Name = PlayerName
Player.CharacterAppearance = CharacterAppearance

local Visit = game:GetService("Visit")
Visit:SetUploadUrl("")

game:SetMessage("Connecting to server...")
local NetworkClient = game:GetService("NetworkClient")
NetworkClient:Connect(ServerAddress, ServerPort)

NetworkClient.ConnectionAccepted:connect(function(Peer, NetworkReplicator)
	NetworkReplicator.Disconnection:connect(function(Peer, LostConnection)
		if LostConnection then
			game:SetMessage("You have lost connection to the game")
		else
			game:SetMessage("This game has shut down")
		end
	end)

	game:SetMessageBrickCount()

	local MarkerReceived = false

	local NetworkMarker = NetworkReplicator:SendMarker()
	NetworkMarker.Received:connect(function()
		MarkerReceived = true

		game:SetMessage("Requesting character")
		NetworkReplicator:RequestCharacter()

		game:SetMessage("Waiting for character")
		Player.CharacterAdded:connect(function()
			game:ClearMessage()
		end)
	end)

	while not MarkerReceived do
		workspace:ZoomToExtents()
		wait(0.5)
	end
end)

NetworkClient.ConnectionFailed:connect(function(Peer, ErrorCode, ErrorMessage)
	game:SetMessage(string.format("Failed to connect to the Game. (ID=%d)", ErrorCode))
end)