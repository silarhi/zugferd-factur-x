<?php

declare(strict_types=1);

/*
 * This file is part of the ZUGFeRD PHP package.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Easybill\ZUGFeRD\Model;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

class TradePrice
{
    #[Type(Amount::class)]
    #[JMS\SerializedName('ChargeAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public Amount $chargeAmount;

    #[Type(Quantity::class)]
    #[JMS\SerializedName('BasisQuantity')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Quantity $basisQuantity = null;

    /**
     * @var TradeAllowanceCharge[]
     */
    #[Type('array<Easybill\ZUGFeRD\Model\TradeAllowanceCharge>')]
    #[XmlList(inline: true, entry: 'AppliedTradeAllowanceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $appliedTradeAllowanceCharges = [];

    public static function create(string $amount, ?Quantity $quantity = null): self
    {
        $self = new self();
        $self->chargeAmount = Amount::create($amount);
        $self->basisQuantity = $quantity;

        return $self;
    }
}
