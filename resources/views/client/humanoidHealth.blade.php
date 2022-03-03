<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="Script" referent="RBX0">
		<Properties>
			<bool name="Disabled">false</bool>
			<Content name="LinkedSource"><null></null></Content>
			<string name="Name">HealthScript v2.0</string>
			<string name="Source">local humanoid = script.Parent.Humanoid

if (humanoid == nil) then
	print(&quot;ERROR: no humanoid found in &apos;HealthScript v2.0&apos;&quot;)
end


function CreateGUI()
	local p = game.Players:GetPlayerFromCharacter(humanoid.Parent)
	print(&quot;Health for Player: &quot; .. p.Name)
	script.HealthGUI.Parent = p.PlayerGui
end

function UpdateGUI(health)
	local pgui = game.Players:GetPlayerFromCharacter(humanoid.Parent).PlayerGui
	local tray = pgui.HealthGUI.Tray
	
	tray.HealthBar.Size = UDim2.new(0.2, 0, 0.8 * (health / humanoid.MaxHealth), 0) 
	tray.HealthBar.Position = UDim2.new(0.4, 0, 0.8 * (1-  (health / humanoid.MaxHealth)) , 0) 

end


function HealthChanged(health)
	UpdateGUI(health)
end


CreateGUI()
humanoid.HealthChanged:connect(HealthChanged)</string>
			<bool name="archivable">true</bool>
		</Properties>
		<Item class="GuiMain" referent="RBX1">
			<Properties>
				<string name="Name">HealthGUI</string>
				<bool name="archivable">true</bool>
			</Properties>
			<Item class="Frame" referent="RBX2">
				<Properties>
					<bool name="Active">false</bool>
					<Color3 name="BackgroundColor3">4285215356</Color3>
					<float name="BackgroundTransparency">1</float>
					<Color3 name="BorderColor3">4279970357</Color3>
					<int name="BorderSizePixel">1</int>
					<string name="Name">Tray</string>
					<UDim2 name="Position">
						<XS>0.949999988</XS>
						<XO>0</XO>
						<YS>0.380000025</YS>
						<YO>0</YO>
					</UDim2>
					<UDim2 name="Size">
						<XS>0.0450000018</XS>
						<XO>0</XO>
						<YS>0.340000004</YS>
						<YO>0</YO>
					</UDim2>
					<token name="SizeConstraint">0</token>
					<bool name="Visible">true</bool>
					<int name="ZIndex">1</int>
					<bool name="archivable">true</bool>
				</Properties>
				<Item class="ImageLabel" referent="RBX3">
					<Properties>
						<bool name="Active">false</bool>
						<Color3 name="BackgroundColor3">4294967295</Color3>
						<float name="BackgroundTransparency">1</float>
						<Color3 name="BorderColor3">4279970357</Color3>
						<int name="BorderSizePixel">1</int>
						<Content name="Image"><url>http://{{ request()->getHttpHost() }}/Asset/?id=18441769</url></Content>
						<string name="Name">ImageLabel</string>
						<UDim2 name="Position">
							<XS>0</XS>
							<XO>0</XO>
							<YS>0.800000012</YS>
							<YO>3</YO>
						</UDim2>
						<UDim2 name="Size">
							<XS>1</XS>
							<XO>0</XO>
							<YS>0.25</YS>
							<YO>0</YO>
						</UDim2>
						<token name="SizeConstraint">1</token>
						<bool name="Visible">true</bool>
						<int name="ZIndex">1</int>
						<bool name="archivable">true</bool>
					</Properties>
				</Item>
				<Item class="Frame" referent="RBX4">
					<Properties>
						<bool name="Active">false</bool>
						<Color3 name="BackgroundColor3">4286826262</Color3>
						<float name="BackgroundTransparency">0</float>
						<Color3 name="BorderColor3">4278190080</Color3>
						<int name="BorderSizePixel">0</int>
						<string name="Name">HealthBar</string>
						<UDim2 name="Position">
							<XS>0.420000017</XS>
							<XO>0</XO>
							<YS>0</YS>
							<YO>0</YO>
						</UDim2>
						<UDim2 name="Size">
							<XS>0.159999996</XS>
							<XO>0</XO>
							<YS>0.800000012</YS>
							<YO>0</YO>
						</UDim2>
						<token name="SizeConstraint">0</token>
						<bool name="Visible">true</bool>
						<int name="ZIndex">2</int>
						<bool name="archivable">true</bool>
					</Properties>
				</Item>
				<Item class="Frame" referent="RBX5">
					<Properties>
						<bool name="Active">false</bool>
						<Color3 name="BackgroundColor3">4289667875</Color3>
						<float name="BackgroundTransparency">0</float>
						<Color3 name="BorderColor3">4278190080</Color3>
						<int name="BorderSizePixel">0</int>
						<string name="Name">HealthBarBacking</string>
						<UDim2 name="Position">
							<XS>0.419999987</XS>
							<XO>0</XO>
							<YS>0</YS>
							<YO>0</YO>
						</UDim2>
						<UDim2 name="Size">
							<XS>0.159999996</XS>
							<XO>0</XO>
							<YS>0.800000012</YS>
							<YO>0</YO>
						</UDim2>
						<token name="SizeConstraint">0</token>
						<bool name="Visible">true</bool>
						<int name="ZIndex">1</int>
						<bool name="archivable">true</bool>
					</Properties>
				</Item>
			</Item>
		</Item>
	</Item>
</roblox>