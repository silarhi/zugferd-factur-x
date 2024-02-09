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

/**
 * Class AllowanceCharge.
 */
class TradeAllowanceCharge
{
    #[Type(Indicator::class)]
    #[SerializedName('ChargeIndicator')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Indicator $indicator = null;

    #[Type('float')]
    #[SerializedName('SequenceNumeric')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?float $sequenceNumeric = null;

    #[Type('string')]
    #[SerializedName('CalculationPercent')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $calculationPercent = null;

    #[Type(Amount::class)]
    #[SerializedName('BasisAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $basisAmount = null;

    #[Type(Quantity::class)]
    #[SerializedName('BasisQuantity')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Quantity $basisQuantity = null;

    #[Type(Amount::class)]
    #[SerializedName('ActualAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public Amount $actualAmount;

    #[Type('string')]
    #[SerializedName('ReasonCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $reasonCode = null;

    #[Type('string')]
    #[SerializedName('Reason')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $reason = null;

    /**
     * @var TradeTax[]
     */
    #[Type('array<Easybill\ZUGFeRD\Model\TradeTax>')]
    #[XmlList(inline: true, entry: 'CategoryTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeTax = [];
}
