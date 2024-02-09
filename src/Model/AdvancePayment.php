<?php

declare(strict_types=1);

/*
 * This file is part of the ZUGFeRD PHP package.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Easybill\ZUGFeRD\Model;

class AdvancePayment
{
    #[JMS\Type(Amount::class)]
    #[JMS\SerializedName('PaidAmount')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $totalPrepaidAmount = null;

    #[JMS\Type(DateTimeString::class)]
    #[JMS\SerializedName('FormattedReceivedDateTime')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?DateTimeString $formattedReceivedDateTime = null;

    #[JMS\Type(TradeTax::class)]
    #[JMS\SerializedName('IncludedTradeTax')]
    #[JMS\XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeTax $includedTradeTax = null;
}
