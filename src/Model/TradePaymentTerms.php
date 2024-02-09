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

class TradePaymentTerms
{
    #[Type('string')]
    #[SerializedName('Description')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $description = null;

    #[Type(DateTime::class)]
    #[SerializedName('DueDateDateTime')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?DateTime $dueDate = null;

    #[Type('string')]
    #[SerializedName('DirectDebitMandateID')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $directDebitMandateID = null;

    #[Type(Amount::class)]
    #[SerializedName('PartialPaymentAmount')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Amount $partialPaymentAmount = null;

    #[Type(TradePaymentPenaltyTerms::class)]
    #[SerializedName('ApplicableTradePaymentPenaltyTerms')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradePaymentPenaltyTerms $applicableTradePaymentPenaltyTerms = null;

    #[Type(TradePaymentDiscountTerms::class)]
    #[SerializedName('ApplicableTradePaymentDiscountTerms')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradePaymentDiscountTerms $applicableTradePaymentDiscountTerms = null;

    #[Type(TradeParty::class)]
    #[SerializedName('PayeeTradeParty')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeParty $payeeTradeParty = null;
}
