[{if !$quantity}][{assign var="quantity" value=1}][{/if}]
[{assign var="oPrice" value=$item->getPrice()}]
[{assign var="oManufacturer" value=$item->getManufacturer()}]
[{assign var="oCategory" value=$item->getCategory()}]
{
    "id": "[{$item->getFieldData('oxartnum')}]",
    "name": "[{$item->getFieldData('oxtitle')}]",
    "list_name": "[{$listname}]",
    "brand": "[{if $oManufacturer}][{$oManufacturer->getTitle()}][{/if}]",
    "category": "[{if $oCategory}][{$oCategory->getTitle()}][{/if}]",
    "variant": "[{$item->getFieldData('oxvarselect')}]",
    "list_position": [{$iteration}],
    "quantity": [{$quantity}],
    "price": '[{$oPrice->getPrice()}]'
},