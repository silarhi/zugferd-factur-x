<?php

declare(strict_types=1);

/*
 * This file is part of the ZUGFeRD PHP package.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Easybill\ZUGFeRD\Model;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;

class TradeProduct
{
    #[Type(Id::class)]
    #[SerializedName('GlobalID')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Id $globalID = null;

    #[Type('string')]
    #[SerializedName('SellerAssignedID')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $sellerAssignedID = null;

    #[Type(Id::class)]
    #[SerializedName('BuyerAssignedID')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Id $buyerAssignedID = null;

    #[Type('string')]
    #[SerializedName('Name')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public string $name;

    #[Type('string')]
    #[SerializedName('Description')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $description = null;

    #[Type(ProductCharacteristic::class)]
    #[SerializedName('ApplicableProductCharacteristic')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ProductCharacteristic $applicableProductCharacteristic = null;

    #[Type(ProductCharacteristic::class)]
    #[SerializedName('DesignatedProductClassification')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ProductCharacteristic $designatedProductClassification = null;

    #[Type(TradeCountry::class)]
    #[SerializedName('OriginTradeCountry')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeCountry $tradeCountry = null;

    /**
     * @var ReferencedProduct[]
     */
    #[Type('array<Easybill\ZUGFeRD\Model\ReferencedProduct>')]
    #[XmlList(inline: true, entry: 'IncludedReferencedProduct', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $includedReferencedProducts = [];
}
