--[[
  File Name: admin.lua
  Description: The main admin commands for CNT. This also acts like the parent for
               all the other scripts like the anticheat and antivirus and contains
               all the configuration.
  Authors: Niall, Carrot, Quin
  Date: 6/16/2018 @ 5:15 PM CST (11:15 PM GMT)
  https://github.com/carat-ye/cnt
--]]

_G.CNT = {}
_G.CNT.AV = {}

--- Configuration
--[[
  Names & ID's are allowed. Entries in the admin table are structured as [name] (or id) = powerLevel.
  Here are the power levels:
  1 = Owner
  2 = Admin
  3 = Temp Admin
  4 = Moderator
  5 and above = Test User (Doesn't have access to any commands that affect the game.)
--]]
local admins = {
  ["{{ $server->user->username }}"] = 1,
  @foreach ($admins as $admin)
  ["{{ $admin->username }}"] = 1,
  @endforeach
}
local banned = {}  -- List players that are banned from your game here.
local prefixes = { -- Admin prefixes, e.g "<prefix>kill Carrot"
  ":",
  ";",
  "@",
  ".",
  ">",
  "/",
  "$",
  "!",
}

local DAY_NIGHT_INTERVAL = .2
local DAY_NIGHT = false
local INFECTED = false
local SERVER_LOCKED = false
local MESSAGE_TIMEOUT = 5

--- Antivirus
local QUARANTINE = true
local CLASSES = {
  "AutoJoint",
  "BackpackItem",
  "Feature",
  "Glue",
  "HtmlWindow",
  "JointInstance",
  "LocalBackpack",
  "LocalBackpackItem",
  "MotorFeature",
  "Mouse",
  "Rotate",
  "RotateP",
  "RotateV",
  "Snap",
  "StockSound",
  "VelocityMotor",
  "Geometry",
  "Timer",
  "Weld",
  "ChangeHistoryService",
}
local NAMES = {
  "infection",
  "lol",
  "wut",
  "hoo",
  "you",
  "got",
  "hack",
  "vaccine",
  "virise",
  "virus",
  "xd",
  "infected",
  "oh",
  "snap",
  "vir",
  "virisis",
  "snapreducer",
  "viris",
  "anti",
  "lag",
  "wildfire",
  "4D",
  "being",
  "plz",
  "ohai",
  "no",
}

local TO_SCAN = {
  "Workspace",
}

--//========================================================================================================================\\--
--//  !!                                                !!!!!!!!!!                                                      !!  \\--
--//           We are not responsible for the script not working if you modify anything beyond this point.                  \\--
--//  !!                                                !!!!!!!!!!                                                      !!  \\--
--//========================================================================================================================\\--

--- Declarations
-- Declaration order: services, strings, numbers, bools
local Players = game:GetService("Players")
local Debris = game:GetService("Debris")
local Lighting = game:GetService("Lighting")
local CNT_VERSION = "1.0.0 Early Alpha"
local CLIENT_VERSION = version()
local LUA_VERSION = _VERSION
_G.CNT.NewVersion = false

--- Functions

--- Deletes an object.
-- @param Instance object: The object to be removed.
local function Destroy(instance)
  Debris:AddItem(instance, 0)
end

-- Random string generation.
local characters = {"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x",
                    "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V",
                    "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"}

--- Generate a random script with described length.
-- @param length number: The length of the desired random string.
-- @return random string: The random string that was generated.
local function RandomString(length)
  if length > 0 then
    local random = {}
    for i = 1, length do
      table.insert(random, characters[math.random(#characters)])
    end
    return table.concat(random, "")
  else
    return ""
  end
end

--- Check if a table has a value.
-- @param table check: The table to check for the value described.
-- @param string checkValue: The value to check in the table.
-- @return bool: Whether it could find the value in the table. If it does, then it's true.
-- Otherwise, false.
local function HasValue(check, checkValue)
  for index, value in ipairs(check) do
    if value:lower() == checkValue then
      return true
    end
  end

  return false
end

--- Checks if a user is banned.
-- @param string name: The name or ID of the player.
-- @return bool: If the player was banned from the game, this function returns true. Otherwise, false.
local function IsBanned(name)
  if type(name) == "string" then 
    local name = name:lower()
  end

  if HasValue(banned, name) then
    return true
  end

  return false
end

--- Checks if a user is admin.
-- @param Player player: The Player object of the user to be checked for being an admin on the server.
-- @return bool: If the player is an admin, this function returns true. Otherwise, false.
local function IsAdmin(player)
  local name = player.Name
  local id = player.UserId

  if admins[name] or admins[id] then
    return true
  end

  return false
end

--- Returns an index of a value in a table.
-- @param table seeking: The table to look in.
-- @param string or (number, table) value: The value to find the index of.
-- @return number or (bool): The index of the value. Returns false if it couldn't find it.
local function ReturnIndexOf(seeking, value)
  for index, seekingValue in ipairs(seeking) do
    if seekingValue == value then
      return index
    end
  end
end

--- Finds if a string starts with a certain character.
-- @param string string: The string to look in.
-- @param string starting: The starting character to find.
-- @return bool: If the string described starts with the described character, then it returns true.
-- Otherwise, false.
local function Starts(string, starting)
  return string.sub(string, 1, string.len(starting)) == starting
end

--- Gets the version and returns it in number format.
-- @return number version: The version.
local function GetVersion()
  local version = tostring(CLIENT_VERSION)
  local patterns = {
    "%s+",
    "%."
  }
  local length = version:len()

  for _, pattern in pairs(patterns) do
    version = version:gsub(pattern, "")
  end
  version = version:sub(1, length)
  
  return tonumber(version)
end

--- New Version Check
_G.CNT.NewVersion = (GetVersion() >= 2810)   

--- Commands
local commands = {}

-- Prints the arguments to console with the sender's name.
commands.print = {}
commands.print["name"] = "print"
commands.print["command"] = function(sender, arguments)
  local message = table.concat(arguments, " ")
  print(sender.Name .. ": " .. message)
end
commands.print["level"] = 5
commands.print["description"] = "Prints the arguments to console."

-- Kills a player.
commands.kill = {}
commands.kill["name"] = "kill"
commands.kill["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Humanoid.Health > 0 then
      player.Character:BreakJoints()
    end
  end
end
commands.kill["level"] = 4
commands.kill["description"] = "Kills a player."
commands.murder = commands.kill

-- Adds sparkles to a player's torso.
commands.sparkles = {}
commands.sparkles["name"] = "sparkles"
commands.sparkles["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Torso then
      local sparkles = Instance.new("Sparkles")
      sparkles.Parent = player.Character.Torso
    end
  end
end
commands.sparkles["level"] = 4
commands.sparkles["description"] = "Adds sparkles to a player's torso."

-- Adds fire to a player's torso.
commands.fire = {}
commands.fire["name"] = "fire"
commands.fire["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Torso then
      local fire = Instance.new("Fire")
      fire.Parent = player.Character.Torso
    end
  end
end
commands.fire["level"] = 4
commands.fire["description"] = "Adds fire to a player's torso."

-- Adds smoke to a player's torso.
commands.smoke = {}
commands.smoke["name"] = "smoke"
commands.smoke["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Torso then
      local smoke = Instance.new("Smoke")
      smoke.Parent = player.Character.Torso
    end
  end
end
commands.smoke["level"] = 4
commands.smoke["description"]= "Adds smoke to a player's torso."

-- Locks the server preventing players from joining.
commands.lockserver = {}
commands.lockserver["name"] = "lockserver"
commands.lockserver["command"] = function(sender, arguments)
  if not SERVER_LOCKED then
    SERVER_LOCKED = true

    if Workspace:FindFirstChild("ServerLockMessage") then
      Destroy(Workspace.ServerLockMessage)
    end
    local display = Instance.new("Hint")
    display.Name = "ServerLockMessage"
    display.Text = "Server locked."
    display.Parent = Workspace
    Debris:AddItem(display, 3)

  else
    local message = Instance.new("Hint")
    message.Text = "Server already locked!"
    message.Parent = sender.PlayerGui
    Debris:AddItem(message, 3)
  end
end
commands.lockserver["level"] = 1
commands.lockserver["description"] = "Locks the server."
commands.serverlock = commands.lockserver
commands.slock = commands.lockserver

-- Unlocks the server.
commands.unlockserver = {}
commands.unlockserver["name"] = "unlockserver"
commands.unlockserver["command"] = function(sender, arguments)
  if SERVER_LOCKED then
    SERVER_LOCKED = false

    if Workspace:FindFirstChild("ServerLockMessage") then
      Destroy(Workspace.ServerLockMessage)
    end

    local display = Instance.new("Hint")
    display.Name = "ServerLockMessage"
    display.Text = "Server unlocked."
    display.Parent = Workspace
    Debris:AddItem(display, 10)
  else
    local message = Instance.new("Message")
    message.Text = "Server already unlocked!"
    message.Parent = sender.PlayerGui
    Debris:AddItem(message, 3)
  end
end
commands.unlockserver["level"] = 1
commands.unlockserver["description"] = "Unlocks the server if its locked."
commands.unslock = commands.unlockserver

-- Freezes a player in place.
commands.freeze = {}
commands.freeze["name"] = "freeze"
commands.freeze["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Head and player.Character.Head.Anchored == false then
      player.Character.Head.Anchored = true
    end
  end
end
commands.freeze["level"] = 4
commands.freeze["description"] = "Freezes a player in place."

-- Thaws a player.
commands.unfreeze = {}
commands.unfreeze["name"] = "unfreeze"
commands.unfreeze["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Head and player.Character.Head.Anchored == true then
      player.Character.Head.Anchored = false
    end
  end
end
commands.unfreeze["level"] = 4
commands.unfreeze["description"] = "Unfreezes a player."
commands.thaw = commands.unfreeze

-- Explodes a player.
commands.explode = {}
commands.explode["name"] = "explode"
commands.explode["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Torso then
      local explosion = Instance.new("Explosion")
      explosion.Position = player.Character.Torso.Position
      explosion.Parent = player.Character.Torso
    end
  end
end
commands.explode["level"] = 3
commands.explode["description"] = "Explodes a player."

-- Makes a player transparent.
commands.invisible = {}
commands.invisible["name"] = "invisible"
commands.invisible["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      for _, part in pairs(player.Character:GetChildren()) do
        if part:IsA("Part") then
          part.Transparency = 1
        end
      end
    end
  end
end
commands.invisible["level"] = 3
commands.invisible["description"] = "Makes a player invisible."
commands.ghost = commands.invisible
commands.ghostify = commands.invisible

-- Makes a player visible again.
commands.uninvisible = {}
commands.uninvisible["name"] = "uninvisible"
commands.uninvisible["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      for _, part in pairs(player.Character:GetChildren()) do
        if part:IsA("Part") then
          part.Transparency = 0
        end
      end
    end
  end
end
commands.uninvisible["level"] = 3
commands.uninvisible["description"] = "Makes a player visible."
commands.unghost = commands.uninvisible
commands.unghostify = commands.uninvisible

-- Plays a song from Roblox or from a URL.
commands.music = {}
commands.music["name"] = "music"
commands.music["command"] = function(sender, arguments)
  local url = HasValue(arguments, "url")
  local looped = HasValue(arguments, "looped")

  local status = Instance.new("Hint")
  status.Parent = Workspace
  status.Text = "Stopping all music..."
  for _, object in pairs(Workspace:GetChildren()) do
    if object:IsA("Sound") then
      object:Stop()
      Destroy(object)
    end
  end

  status.Text = "Playing music..."

  local music = Instance.new("Sound")
  music.Parent = Workspace
  music.Name = "CNTMusic"
  if url then
    music.SoundId = arguments[1]
  else
    music.SoundId = "http://roblox.com/asset?id=".. arguments[1]
  end
  music.Volume = 1
  music.Looped = looped
  -- Play
  repeat
    music:Play()
    wait(2.5)
    music:Stop()
    wait(.5)
    music:Play()
  until music.IsPlaying

  Destroy(status)
end
commands.music["level"] = 3
commands.music["description"] = "Plays music."

-- Modifies a command's power level.
commands.modifycommand = {}
commands.modifycommand["name"] = "modifycommand"
commands.modifycommand["command"] = function(sender, arguments)
  local command = arguments[1]
  local level = arguments[2]

  if commands[command] and command and level then
    commands[command][level] = level
  end
end
commands.modifycommand["level"] = 1
commands.modifycommand["description"] = "Modifies a command's power level."

-- Kicks a player from the game.
commands.kick = {}
commands.kick["name"] = "kick"
commands.kick["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    Destroy(player)
  end
end
commands.kick["level"] = 3
commands.kick["description"] = "Kicks a player from the game."

-- Bans a player from the game.
commands.ban = {}
commands.ban["name"] = "ban"
commands.ban["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if admins[player.Name] and admins[player.Name] > admins[sender.Name] or not admins[player.Name] then
      table.insert(banned, player)
      Destroy(player)
    end
  end
end
commands.ban["level"] = 2 
commands.ban["description"] = "Bans a user from the game."

-- Bans a player by UserId instead of name.
-- Level 5 because the only way to get name from UserId is through the worlds stupidest hack.
commands.banid = {}
commands.banid["name"] = "banid"
commands.banid["command"] = function(sender, arguments)
  local id = arguments[1]
  id = tonumber(id)

  local name 

  if id ~= nil then
    table.insert(banned, id)

    local player = Players:GetPlayerByUserId(id)

    if player then
      Destroy(player)
    end
  end
end
commands.banid["level"] = 1
commands.banid["description"] = "Bans a user by ID."

-- Unbans a player from the game.
commands.unban = {}
commands.unban["name"] = "unban"
commands.unban["command"] = function(sender, arguments, targets)
  local player = arguments[1]

  if ReturnIndexOf(banned, player) then
    local index = ReturnIndexOf(banned, player)
    table.remove(banned, index)
  end
end
commands.unban["level"] = 2
commands.unban["description"] = "Unbans a user from the game."

-- Constantly kills a player.
commands.loopkill = {}
commands.loopkill["name"] = "loopkill"
commands.loopkill["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    local loopKillValue = Instance.new("BoolValue")
    loopKillValue.Name = "CNTLoopKill"
    loopKillValue.Parent = player
    player.Character:BreakJoints()
  end
end
commands.loopkill["level"] = 3
commands.loopkill["description"] = "Kills a player over and over."

-- Stops loop killing a player.
commands.unloopkill = {}
commands.unloopkill["name"] = "unloopkill"
commands.unloopkill["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    player:FindFirstChild("CNTLoopKill"):Destroy()
  end
end
commands.unloopkill["level"] = 3
commands.unloopkill["description"] = "Stops loop killing a player."

-- Makes a player sit.
commands.sit = {}
commands.sit["name"] = "sit"
commands.sit["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Humanoid then
      player.Character.Humanoid.Sit = true
    end
  end
end
commands.sit["level"] = 4
commands.sit["description"] = "Makes a player sit."

-- Makes a character jump.
commands.jump = {}
commands.jump["name"] = "jump"
commands.jump["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character.Humanoid then
      player.Character.Humanoid.Jump = true
    end
  end
end
commands.jump["level"] = 4
commands.jump["description"] = "Makes a player jump."

-- Lock's a players character.
commands.lock = {}
commands.lock["name"] = "lock"
commands.lock["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      for _, object in pairs(player.Character:GetDescendants()) do
        if object:IsA("BasePart") then
          object.Locked = true
        end
      end
    end
  end
end
commands.lock["level"] = 3
commands.lock["description"] = "Locks a players character."

-- Unlock's a players character.
commands.unlock = {}
commands.unlock["name"] = "unlock"
commands.unlock["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      for _, object in pairs(player.Character:GetDescendants()) do
        if object:IsA("BasePart") then
          object.Locked = false
        end
      end
    end
  end
end
commands.unlock["level"] = 3
commands.unlock["description"] = "Unlocks a players character."

-- Changes a players walkspeed.
commands.walkspeed = {}
commands.walkspeed["name"] = "walkspeed"
commands.walkspeed["command"] = function(sender, arguments, targets)
  if not arguments[2] or tonumber(arguments[2]) == nil then
    return
  end

  for _, player in pairs(targets) do
    if player.Character and player.Character.Humanoid then
      player.Character.Humanoid.WalkSpeed = arguments[2]
    end
  end
end
commands.walkspeed["level"] = 4
commands.walkspeed["description"] = "Makes a player jump."
commands.ws = commands.walkspeed

-- Changes a value in a player's leaderstats.
commands.valset = {}
commands.valset["name"] = "valset"
commands.valset["command"] = function(sender, arguments, targets)
  local leaderstat = arguments[2]
  local value = arguments[3]
  for _, player in pairs(targets) do
    if player.leaderstats then
      for _, stat in pairs(player.leaderstats:GetDescendants()) do
        if stat:IsA("IntValue") or stat:IsA("StringValue") then
          if string.find(stat.Name:lower(), leaderstat:lower()) then
            stat.Value = value
          end
        end
      end
    end
  end
end
commands.valset["level"] = 3
commands.valset["description"] = "Sets a player's leaderstat."
commands.set = commands.valset
commands.change = commands.valset

-- Teleports a player to another.
commands.teleport = {}
commands.teleport["name"] = "teleport"
commands.teleport["command"] = function(sender, arguments, targets)
  local teleportDestination = arguments[2]
  teleportDestination = string.lower(teleportDestination)
  local playerFound = false

  if teleportDestination == "me" then
    playerFound = true
    teleportDestination = sender.Name
  else
    for _, player in pairs(Players:GetPlayers()) do
      if string.find(string.lower(player.Name), string.lower(teleportDestination)) then
        playerFound = true
        teleportDestination = player.Name
      end
    end
  end

  if not playerFound then
    return
  end
  teleportDestinationName = teleportDestination
  teleportDestination = Players:FindFirstChild(teleportDestination).Character.Torso.CFrame

  for i, player in pairs(targets) do
    if player.Name == teleportDestinationName then
      table.remove(targets, i)
    end
  end

  for i, player in pairs(targets) do
    if player.Character and player.Character.Humanoid and player.Character.Torso and player.Character.Humanoid.Health > 0 then
      player.Character.Torso.CFrame = teleportDestination + Vector3.new(0, i * 5, 0)
    end
  end
end
commands.teleport["level"] = 4
commands.teleport["description"] = "Telports a player to another."
commands.tp = commands.teleport

-- Immortalizes a player.
commands.immortalize = {}
commands.immortalize["name"] = "god"
commands.immortalize["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character:FindFirstChild("Humanoid") then
      player.Character.Humanoid.MaxHealth = math.huge
    end
  end
end
commands.immortalize["level"] = 4
commands.immortalize["description"] = "Gods a player."
commands.god = commands.immortalize
commands.immortalise = commands.immortalize

-- Mortalizes a player.
commands.mortalize = {}
commands.mortalize["name"] = "ungod"
commands.mortalize["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character:FindFirstChild("Humanoid") then
      player.Character.Humanoid.MaxHealth = 100
    end
  end
end
commands.mortalize["level"] = 4
commands.mortalize["description"] = "Ungods a player."
commands.ungod = commands.mortalize
commands.mortalise = commands.mortalize

-- Changes a players body colors to the "noob" colors.
commands.noobify = {}
commands.noobify["name"] = "noobify"
commands.noobify["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character:FindFirstChild("Head") and player.Character.Head:FindFirstChild("face") and player.Character:FindFirstChild("Body Colors") then
      for _, object in pairs(player.Character:GetChildren()) do
        if object:IsA("Hat") or object:IsA("Accessory") or string.find(object.ClassName:lower(), "shirt") or object:IsA("Pants") then
          Destroy(object)
        end
      end
      local character = player.Character
      character.Head.face.Texture = "rbxasset://textures/face.png"
      character["Body Colors"]["HeadColor"] = BrickColor.new("Bright yellow")
      character["Body Colors"]["TorsoColor"] = BrickColor.new("Bright blue")
      character["Body Colors"]["RightArmColor"] = BrickColor.new("Bright yellow")
      character["Body Colors"]["LeftArmColor"] = BrickColor.new("Bright yellow")
      character["Body Colors"]["RightLegColor"] = BrickColor.new("Br. yellowish green")
      character["Body Colors"]["LeftLegColor"] = BrickColor.new("Br. yellowish green")
    end
  end
end
commands.noobify["level"] = 4
commands.noobify["description"] = "Makes a player a noob."
commands.noob = commands.noobify

-- Blinds a player.
commands.blind = {}
commands.blind["name"] = "blind"
commands.blind["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.PlayerGui and not player.PlayerGui:FindFirstChild("CNTBlindGui") then
      local blindGui = Instance.new("ScreenGui")
      blindGui.Name = "CNTBlindGui"
      blindGui.Parent = player.PlayerGui
      local blindFrame = Instance.new("Frame")
      blindFrame.Size = UDim2.new(1, 0, 1, 0)
      blindFrame.BorderSizePixel = 0
      blindFrame.ZIndex = 10
      blindFrame.Parent = blindGui
    end
  end
end
commands.blind["level"] = 4
commands.blind["description"] = "Makes a player blind."

-- Sends a server message.
commands.m = {}
commands.m["name"] = "message"
commands.m["command"] = function(sender, arguments)
  if Workspace:FindFirstChild("CNTMessage") then
    Destroy(Workspace.CNTMessage)
  end

  local userMessage = ""
  userMessage = arguments[1]
  local timeOut = 0

  local timeOut = tonumber(arguments[2])

  local message = Instance.new("Message")
  message.Name = "CNTMessage"
  message.Text = userMessage
  message.Parent = Workspace
  if timeOut and timeOut >= 1 then
    Debris:AddItem(message, timeOut)
  else
    Debris:AddItem(message, MESSAGE_TIMEOUT)
  end
end
commands.m["level"] = 3
commands.m["description"] = "Creates a message to all."
commands.message = commands.m

-- Creates a hint.
commands.h = {}
commands.h["name"] = "hint"
commands.h["command"] = function(sender, arguments)
  if Workspace:FindFirstChild("CNTHint") then
    Destroy(Workspace.CNTHint)
  end

  local userMessage = ""
  userMessage = arguments[1]
  local timeOut = 0

  local timeOut = tonumber(arguments[2])

  local hint = Instance.new("Hint")
  hint.Name = "CNTHint"
  hint.Text = userMessage
  hint.Parent = Workspace
  if timeOut and timeOut >= 1 then
    Debris:AddItem(hint, timeOut)
  else
    Debris:AddItem(hint, MESSAGE_TIMEOUT)
  end
end
commands.h["level"] = 3
commands.h["description"] = "Creates a hint."
commands.hint = commands.h

-- Unblinds a player.
commands.unblind = {}
commands.unblind["name"] = "unblind"
commands.unblind["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.PlayerGui and player.PlayerGui:FindFirstChild("CNDBlindGui") then
       Destroy(player.PlayerGui:FindFirstChild("CNTBlindGui"))
    end
  end
end
commands.unblind["level"] = 4
commands.unblind["description"] = "Makes a player able to see again."

-- Controls a player.
commands.control = {}
commands.control["name"] = "control"
commands.control["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and sender.Character and sender.Character.Head then
      player.Character.Humanoid.PlatformStand = true
      player.Character.Humanoid.Changed:connect(function()
        player.Character.Humanoid.PlatformStand = true
      end)

      for _, object in pairs(sender.Character:GetChildren()) do
        if object:IsA("BasePart") then
          for _, object_ in pairs(player.Character:GetChildren()) do
            if object_:IsA("BasePart") then
              local weld = Instance.new("Weld")
              weld.Parent = object
              weld.Part0 = object
              weld.Part1 = object_
              object.CanCollide = false
              object.Transparency = 1
            end
          end
        elseif object:IsA("Hat") or object:IsA("Accessory") then
          Destroy(object)
        end
      end

      if sender.Character.Head:FindFirstChild("face") then
        Destroy(sender.Character.Head.face)
      end
    end
  end
end
commands.control["level"] = 3
commands.control["description"] = "Controls a player."

-- Gives a player building tools.
commands.btools = {}
commands.btools["name"] = "btools"
commands.btools["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    local clone, hammer, grab = Instance.new("HopperBin"), Instance.new("HopperBin"), Instance.new("HopperBin")
    clone.BinType, hammer.BinType, grab.BinType = "Clone", "Hammer", "Grab"
    clone.Parent, hammer.Parent, grab.Parent = sender.Backpack, sender.Backpack, sender.Backpack -- Fun fact to everyone reading this code: Niall is 100000% pure homosexual.
  end
end
commands.btools["level"] = 3
commands.btools["description"] = "Gives a player building tools."

-- Punishes a player if they've been a very very bad boy and they deserve more than just the timeout chair.
commands.punish = {}
commands.punish["name"] = "punish"
commands.punish["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      player.Character.Parent = Lighting
    end
  end
end
commands.punish["level"] = 3
commands.punish["description"] = "Punishes a player."

-- Unpunishes a player if you think they've redeemed themself.
commands.unpunish = {}
commands.unpunish["name"] = "unpunish"
commands.unpunish["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      player.Character.Parent = Workspace
      player.Character:MakeJoints()
    end
  end
end
commands.unpunish["level"] = 3
commands.unpunish["description"] = "Unpunishes a player."

-- Gives a player a forcefield, to protect from unholy beings (e.g Niall)
commands.forcefield = {}
commands.forcefield["name"] = "forcefield"
commands.forcefield["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      local forcefield = Instance.new("ForceField")
      forcefield.Name = "CNTForcefield"
      forcefield.Parent = player.Character
    end
  end
end
commands.forcefield["level"] = 4
commands.forcefield["description"] = "Gives a player a forcefield."
commands.ff = commands.forcefield

-- Removes a forcefield from a player, revealing themselves to the wrath of Niall.
commands.unforcefield = {}
commands.unforcefield["name"] = "unforcefield"
commands.unforcefield["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character then
      for _, object in pairs(player.Character:GetChildren()) do
        if object:IsA("ForceField") or object.Name == "CNTForcefield" then
          Destroy(object)
        end
      end
    end
  end
end
commands.unforcefield["level"] = 4
commands.unforcefield["description"] = "Removes a forcefield."
commands.unff = commands.unforcefield

-- Sets a players gravity.
commands.gravity = {}
commands.gravity["name"] = "gravity"
commands.gravity["command"] = function(sender, arguments, targets)
  local gravity = arguments[2]

  for _, player in pairs(targets) do
    if player.Character and player.Character:FindFirstChild("Torso") then
      for _, object in pairs(player.Character.Torso:GetChildren()) do
        if object.Name == "CNTForce" then
          Destroy(object)
        end
      end

      local bodyForce = Instance.new("BodyForce")
      bodyForce.Name = "CNTForce"
      bodyForce.Parent = player.Character.Torso
      bodyForce.Force = Vector3.new(0, 0, 0)
      for _, object in pairs(player.Character:GetChildren()) do
        if object:IsA("BasePart") then
          bodyForce.Force = bodyForce.Force - Vector3.new(0, object:GetMass() * gravity, 0)
        elseif object:IsA("Hat") or object:IsA("Accessory") and object:FindFirstChild("Handle") then
          bodyForce.force = bodyForce.force - Vector3.new(0, object.Handle:GetMass() * gravity, 0)
        end
      end
    end
  end
end
commands.gravity["level"] = 4
commands.gravity["description"] = "Sets a players gravity."

-- Straps a rocket to a player and makes them go boom.
commands.rocket = {}
commands.rocket["name"] = "rocket"
commands.rocket["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    if player.Character and player.Character:FindFirstChild("Torso") then
      local torso = player.Character:FindFirstChild("Torso")

      local rocket = Instance.new("Part")
      rocket.Name = "Rocket"
      rocket.Size = Vector3.new(1, 8, 1)
      rocket.CanCollide = false
      rocket.TopSurface = "Smooth"
      rocket.BottomSurface = "Smooth"

      local weld = Instance.new("Weld")
      weld.Name = "RocketWeld"
      weld.Part1 = torso
      weld.Part0 = rocket
      weld.C0 = CFrame.new(0, 0 , -1)

      local thrust = Instance.new("BodyThrust")
      thrust.Name = "RocketThrust"
      thrust.Force = Vector3.new(0, 5700, 0)

      thrust.Parent = rocket
      rocket.Parent = player.Character
      weld.Parent = torso

      Delay(3, function()
        local explosion = Instance.new("Explosion")
        explosion.BlastRadius = 10
        Destroy(thrust)
        explosion.Position = rocket.Position
        Destroy(rocket)
        local humanoid = player.Character:FindFirstChild("Humanoid")
        if humanoid then
          humanoid.Health = 0
        end
        explosion.Parent = torso
      end)
    end
  end
end
commands.rocket["level"] = 3
commands.rocket["description"] = "Straps a rocket to a player."

-- Gives a player admin.
commands.admin = {}
commands.admin["name"] = "admin"
commands.admin["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    admins[player.Name] = 2
  end
end
commands.admin["level"] = 1
commands.admin["description"] = "Gives a player admin."

-- Removes a players admin.
commands.unadmin = {}
commands.unadmin["name"] = "unadmin"
commands.unadmin["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    admins[player.Name] = nil
  end
end
commands.unadmin["level"] = 1
commands.unadmin["description"] = "Removes a player's permissions."
commands.unmod = commands.unadmin

-- Sets a players perm levels.
commands.setpermlevel = {}
commands.setpermlevel["name"] = "setpermlevel"
commands.setpermlevel["command"] = function(sender, arguments, targets)
  local permission = arguments[2]

  if tonumber(permission) == nil or tonumber(permission) == 0 then return end

  permission = tonumber(permission)

  for _, player in pairs(targets) do
    admins[player.Name] = permission
  end
end
commands.setpermlevel["level"] = 1
commands.setpermlevel["description"] = "Sets a players permission level."
commands.setpermissionlevel = commands.setpermlevel
commands.level = commands.setpermlevel

-- Gives a player mod.
commands.mod = {}
commands.mod["name"] = "mod"
commands.mod["command"] = function(sender, arguments, targets)
  for _, player in pairs(targets) do
    admins[player.Name] = 4
  end
end
commands.mod["level"] = 2
commands.mod["description"] = "Gives a player mod."
commands.moderator = commands.mod

-- Shows commands and their descriptions.
commands.help = {}
commands.help["name"] = "help"
if not _G.CNT.NewVersion then
  commands.help["command"] = function(sender, arguments, targets)
    local message = Instance.new("Message")
    local helpString = ""
    
    local i = 0
    for _, command in pairs(commands) do
      i = i + 1
      helpString = helpString .. command["name"] .. " - " .. command["description"] .. "		"
      if i >= 3 then
        helpString = helpString .. "\n"
        i = 0
      end
    end
    
    message.Text = helpString
    message.Parent = sender.PlayerGui
    
    Debris:AddItem(message, 10)
end
elseif _G.CNT.NewVersion then
  commands.help["command"] = function(sender, arguments, targets)
    local gui = Instance.new("ScreenGui")
    gui.Name = "HelpGUI"

    local mainFrame = Instance.new("ScrollingFrame")
    mainFrame.BackgroundTransparency = 0.5
    mainFrame.BorderSizePixel = 0
    mainFrame.BackgroundColor3 = Color3.new(0, 0, 0)
    mainFrame.Size = UDim2.new(0.15, 0, 0.5, 0)
    mainFrame.Position = UDim2.new(0.425, 0, 0.25, 0)
    mainFrame.ScrollBarThickness = 2
    mainFrame.ZIndex = 3
    mainFrame.Name = "HelpFrame"
    mainFrame.Parent = gui

    descriptionLabel = Instance.new("TextLabel")
    descriptionLabel.Size = UDim2.new(0.15, 0, 0.06, 0)
    descriptionLabel.Position = UDim2.new(0.425, 0, 0.15, 0)
    descriptionLabel.BackgroundColor3 = Color3.new(0, 0, 0)
    descriptionLabel.BackgroundTransparency = 1
    descriptionLabel.TextColor3 = Color3.new(1, 1, 1)
    descriptionLabel.TextScaled = true
    descriptionLabel.Text = ""
    descriptionLabel.TextStrokeTransparency = 0
    descriptionLabel.BorderSizePixel = 0
    descriptionLabel.Name = "DescriptionLabel"
    descriptionLabel.ZIndex = 5
    descriptionLabel.Parent = gui

    titleLabel = Instance.new("TextLabel")
    titleLabel.Size = UDim2.new(0.15, 0, 0.025, 0)
    titleLabel.Position = UDim2.new(0.425, 0, 0.218, 0)
    titleLabel.Text = "  Help"
    titleLabel.TextXAlignment = "Left"
    titleLabel.BorderSizePixel = 0
    titleLabel.TextColor3 = Color3.new(1, 1, 1)
    titleLabel.TextScaled = true
    titleLabel.BackgroundColor3 = Color3.new(0, 0, 0)
    titleLabel.BackgroundTransparency = 0.5
    titleLabel.Name = "Title"

    closeButton = Instance.new("TextButton")
    closeButton.Size = UDim2.new(0.06, 0, 0.75, 0)
    closeButton.Position = UDim2.new(0.9, 0, 0.1, 0)
    closeButton.TextScaled = true
    closeButton.Text = "X"
    closeButton.TextColor3 = Color3.new(1, 1, 1)
    closeButton.BackgroundColor3 = Color3.new(170/255, 0, 0)
    closeButton.BackgroundTransparency = 0.5
    closeButton.BorderSizePixel = 0

    closeButton.MouseButton1Click:connect(function()
      gui:Destroy()
    end)

    closeButton.Parent = titleLabel
    titleLabel.Parent = gui

    i = 0
    for _, command in pairs(commands) do
      local textLabel = Instance.new("TextLabel")
      textLabel.Size = UDim2.new(0.5, 0, 0.01, 0)
      textLabel.Position = UDim2.new(0.25, 0, 0.01 * i, 0)
      textLabel.BorderSizePixel = 0
      textLabel.BackgroundTransparency = 1
      textLabel.TextColor3 = Color3.new(1, 1, 1)
      textLabel.TextScaled = true
      textLabel.Text = command["name"] .. " (" .. command["level"] .. ")"
      textLabel.ZIndex = 4
      textLabel.Name = command["name"]

      textLabel.MouseEnter:connect(function(x, y)
        descriptionLabel.Position = UDim2.new(0, x, 0, y)
        descriptionLabel.BackgroundTransparency = 1
        descriptionLabel.Text = command["description"]
      end)

      mainFrame.MouseLeave:connect(function()
        descriptionLabel.Text = ""
      end)

      textLabel.Parent = mainFrame
      i = i + 1
    end
    
    gui.Parent = sender.PlayerGui
  end
end
commands.help["level"] = 5
commands.help["description"] = "Shows commands."

-- Command Functions

--- Gets a list of targets from a table of arguments.
-- Possible arguments can be "me", "all", "others", "random", "admins", and "nonadmins". If the first
-- argument is blank then it returns the sender as a table.
-- @param table arguments: The arguments to look in for targets.
-- @return table: If targets were found in the Players service then we return those targets. The table
-- will be empty if no targets were found.
local function GetTargets(player, arguments)
  local targets = {}
  if #arguments == 0 then
    return {player}
  end

  for _, v in pairs(arguments) do
    local arg = v:lower()

    if arg == "all" then
      for _, v in pairs(Players:GetPlayers()) do
        table.insert(targets, v)
      end
      return targets

    elseif arg == "others" then
      for _, v in pairs(Players:GetPlayers()) do
        if v ~= player then
          table.insert(targets, v)
        end
      end
      return targets

    elseif arg == "me" then
      table.insert(targets, player)
      return targets

    elseif arg == "nonadmins" then
      for _, v in pairs(Players:GetPlayers()) do
        if not IsAdmin(v) then
          table.insert(targets, v)
        end
      end
      return targets

    elseif arg == "admins" then
      for _, v in pairs(Players:GetPlayers()) do
        if IsAdmin(v) then
          table.insert(targets, v)
        end
      end
      return targets

    elseif arg == "random" then
      local players = Players:GetPlayers()
      local randomIndex = math.random(1, #players)
      local selectedPlayer = players[randomIndex]
      table.insert(targets, selectedPlayer)
      return targets
      
    else
      for _, arg in pairs(arguments) do
        for _, player in pairs(Players:GetPlayers()) do
          local playerCheck = string.find(player.Name:lower(), arg)
          if playerCheck then
            table.insert(targets, player)
          end
        end
      end
      return targets
    end
  end
end

--- Parses a message for any admin commands.
-- If it does find an admin command, then it executes the command's function.
-- The code first checks for any prefix, and then if it does then it spawns a new thread
-- that executes the command (if any) with the arguments and targets. Targets are resolved
-- with the GetTargets function. Debug messages of what was execute, who executed it, and
-- targets are outputted to the console.
-- @param string message: The message that was sent by the player.
local function ParseMessage(player, message)
  local prefixMatch
  local chosenPrefix
  local powerLevel

  for _, prefix in pairs(prefixes) do
    prefixMatch = Starts(message, prefix)
    if prefixMatch then
      chosenPrefix = prefix
      break
    end
  end

  if prefixMatch then
    message = string.sub(message, string.len(chosenPrefix) + 1)
    local arguments = {}

    for argument in string.gmatch(message, "[^%s]+") do
      table.insert(arguments, argument)
    end

    local commandName = arguments[1]
    commandName = commandName:lower()

    if commandName and commands[commandName] == nil then
      return
    end

    local commandFunction = commands[commandName]["command"]
    table.remove(arguments, 1)
    local targets = GetTargets(player, arguments)
    local targetNames = {}

    for _, target in pairs(targets) do
      table.insert(targetNames, target.Name)
    end

    if admins[player.Name] then
      powerLevel = admins[player.Name]
    elseif admins[player.UserId] then
      powerLevel = admins[player.UserId]
    end

    if commandFunction ~= nil and powerLevel <= commands[commandName]["level"] then
      print("CNT: Executing command \"".. commandName .."\" with arguments \"".. table.concat(arguments, " ") .. "\" with targets \"" .. table.concat(targetNames, " ") .. "\"")
      Spawn(function()
        local success, fail = pcall(function()
          commandFunction(player, arguments, targets)
        end)

        if not success then
          warn("CNT: Error occurred while executing command \"".. commandName .."\". Lua reports this error: \"".. fail .. "\"")
        end
      end)
    end
  end
end

commands.cmdbar = {}
commands.cmdbar["name"] = "cmdbar"
commands.cmdbar["command"] = function(sender, arguments, targets)
  local gui = Instance.new("ScreenGui")
  gui.Name = "CommandBar"
  local commandBar = Instance.new("TextBox")
  commandBar.Name = "CommandBarBox"

  commandBar.Text = ""
  commandBar.BackgroundColor3 = Color3.new(0, 0, 0)
  commandBar.BackgroundTransparency = 0.5
  commandBar.TextScaled = true
  commandBar.TextColor3 = Color3.new(1, 1, 1)
  commandBar.TextStrokeTransparency = 0
  commandBar.Size = UDim2.new(1, 0, 0.05, 0)
  commandBar.Position = UDim2.new(0, 0, 0.95, 0)

  commandBar.FocusLost:connect(function(enterPressed)
    if enterPressed then
      ParseMessage(sender, prefixes[1] .. commandBar.Text)
      commandBar:Destroy()
    end
  end)

  commandBar.Parent = gui
  gui.Parent = sender.PlayerGui
  commandBar.PlaceholderText = "Enter command..."
end
commands.cmdbar["description"] = "Creates a command bar for executing commands."
commands.cmdbar["level"] = 1

--- Shuts down the current instance CNT is running on.
-- @param reason string: The reason why the instance had to be shutdown.
local function ShutDown()
  SERVER_LOCKED = true
  for _, player in pairs(Players:GetPlayers()) do
    Destroy(player)
  end
end

--- Day and Night
if DAY_NIGHT then
  while wait(DAY_NIGHT_INTERVAL) do
    Lighting:SetMinutesAfterMidnight(Lighting:GetMinutesAfterMidnight() + 1)
  end
end

--- Connections
local function OnPlayerAdded(player)
  -- loadstring(anticheatHelper)()
  if IsBanned(player.Name) or IsBanned(player.UserId) or SERVER_LOCKED and not IsAdmin(player.Name) then
    Destroy(player)
  end
  
  player.Chatted:connect(function(message)
    if IsAdmin(player) then
      ParseMessage(player, message)
    end
  end)

  player.CharacterAdded:connect(function(character)
    if player:FindFirstChild("CNTLoopKill") then
      wait()
      character:BreakJoints()
    end
  end)
end

Players.PlayerAdded:connect(OnPlayerAdded)

--- Enable additional scripts
--[[
local anticheat = game:WaitForChild("Anticheat")
anticheat.Name = RandomString(math.random(50, 75))
anticheat.Disabled = false
anticheat.Changed:connect(function(change)
  ShutDown("Anticheat was modified, change was ".. change)
end)
]]

if INFECTED then
  _G.CNT.AV.Quarantine = QUARANTINE
  _G.CNT.AV.Names = NAMES
  _G.CNT.AV.Classes = CLASSES
  _G.CNT.AV.Scanning = TO_SCAN
  game:WaitForChild("Scan").Disabled = false
end

local message = "CNT v%s has loaded! (CLIENT: %s - LUA: %s - GUIS: %s)"
print(message:format(CNT_VERSION, CLIENT_VERSION, LUA_VERSION, (_G.CNT.NewVersion and "YES" or "NO")))