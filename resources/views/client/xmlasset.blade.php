@if ($item->type == "Face")
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
    <External>null</External>
    <External>nil</External>
    <Item class="Decal" referent="RBX0">
        <Properties>
            <token name="Face">5</token>
            <string name="Name">face</string>
            <float name="Shiny">20</float>
            <float name="Specular">0</float>
            <Content name="Texture"><url>{{ url('/asset?id=' . $item->id) }}</url></Content>
            <bool name="archivable">true</bool>
        </Properties>
    </Item>
</roblox>
@elseif ($item->type == "T-Shirt")
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="ShirtGraphic" referent="RBX0">
		<Properties>
			<Content name="Graphic"><url>{{ url('/asset?id=' . $item->id) }}</url></Content>
			<string name="Name">Shirt Graphic</string>
			<bool name="archivable">true</bool>
		</Properties>
	</Item>
</roblox>
@elseif ($item->type == "Shirt")
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="Shirt" referent="RBX0">
		<Properties>
			<Content name="ShirtTemplate"><url>{{ url('/asset?id=' . $item->id) }}</url></Content>
			<string name="Name">Shirt</string>
			<bool name="archivable">true</bool>
		</Properties>
	</Item>
</roblox>
@elseif ($item->type == "Pants")
<roblox xmlns:xmime="http://www.w3.org/2005/05/xmlmime" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="http://www.roblox.com/roblox.xsd" version="4">
	<External>null</External>
	<External>nil</External>
	<Item class="Pants" referent="RBX0">
		<Properties>
			<Content name="PantsTemplate"><url>{{ url('/asset?id=' . $item->id) }}</url></Content>
			<string name="Name">Pants</string>
			<bool name="archivable">true</bool>
		</Properties>
	</Item>
</roblox>
@else
Invalid asset.
@endif