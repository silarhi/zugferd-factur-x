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

class TradeTax
{
    #[Type(Amount::class)]
    #[SerializedName('CalculatedAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $calculatedAmount = null;

    #[Type('string')]
    #[SerializedName('TypeCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public string $typeCode;

    #[Type('string')]
    #[SerializedName('ExemptionReason')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $exemptionReason = null;

    #[Type(Amount::class)]
    #[SerializedName('BasisAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $basisAmount = null;

    #[Type(Amount::class)]
    #[SerializedName('LineTotalBasisAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $lineTotalBasisAmount = null;

    #[Type(Amount::class)]
    #[SerializedName('AllowanceChargeBasisAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $allowanceChargeBasisAmount = null;

    #[Type('string')]
    #[SerializedName('ApplicablePercent')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $applicablePercent = null;

    #[Type('string')]
    #[SerializedName('CategoryCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $categoryCode = null;

    #[Type('string')]
    #[SerializedName('ExemptionReasonCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $exemptionReasonCode = null;

    #[Type(DateTime::class)]
    #[SerializedName('TaxPointDate')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?DateTime $taxPointDate = null;

    #[Type('string')]
    #[SerializedName('DueDateTypeCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $dueDateTypeCode = null;

    #[Type('string')]
    #[SerializedName('RateApplicablePercent')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $rateApplicablePercent = null;
}
