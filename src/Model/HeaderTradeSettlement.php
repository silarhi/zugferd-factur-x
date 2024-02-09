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

class HeaderTradeSettlement
{
    #[Type('string')]
    #[SerializedName('CreditorReferenceID')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $creditorReferenceID = null;

    #[Type('string')]
    #[SerializedName('PaymentReference')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $paymentReference = null;

    #[Type('string')]
    #[SerializedName('TaxCurrencyCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $taxCurrency = null;

    #[Type('string')]
    #[SerializedName('InvoiceCurrencyCode')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public string $currency;

    #[Type('string')]
    #[SerializedName('InvoiceIssuerReference')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?string $invoiceIssuerReference = null;

    #[Type(TradeParty::class)]
    #[SerializedName('InvoicerTradeParty')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeParty $invoicerTradeParty = null;

    #[Type(TradeParty::class)]
    #[SerializedName('InvoiceeTradeParty')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeParty $invoiceeTradeParty = null;

    #[Type(TradeParty::class)]
    #[SerializedName('PayerTradeParty')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeParty $payerTradeParty = null;

    #[Type(TradeParty::class)]
    #[SerializedName('PayeeTradeParty')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeParty $payeeTradeParty = null;

    #[Type(TradeCurrencyExchange::class)]
    #[SerializedName('TaxApplicableTradeCurrencyExchange')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradeCurrencyExchange $taxApplicableTradeCurrencyExchange = null;

    /**
     * @var TradeSettlementPaymentMeans[]
     */
    #[Type('array<' . TradeSettlementPaymentMeans::class . '>')]
    #[XmlList(inline: true, entry: 'SpecifiedTradeSettlementPaymentMeans', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradeSettlementPaymentMeans = [];

    /**
     * @var TradeTax[]
     */
    #[Type('array<' . TradeTax::class . '>')]
    #[XmlList(inline: true, entry: 'ApplicableTradeTax', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeTaxes = [];

    #[Type(Period::class)]
    #[SerializedName('BillingSpecifiedPeriod')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?Period $billingSpecifiedPeriod = null;

    /**
     * @var TradeAllowanceCharge[]
     */
    #[Type('array<' . TradeAllowanceCharge::class . '>')]
    #[XmlList(inline: true, entry: 'SpecifiedTradeAllowanceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradeAllowanceCharge = [];

    /**
     * @var LogisticsServiceCharge[]
     */
    #[Type('array<' . LogisticsServiceCharge::class . '>')]
    #[XmlList(inline: true, entry: 'SpecifiedLogisticsServiceCharge', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedLogisticsServiceCharge = [];

    /**
     * @var TradePaymentTerms[]
     */
    #[Type('array<' . TradePaymentTerms::class . '>')]
    #[XmlList(inline: true, entry: 'SpecifiedTradePaymentTerms', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $specifiedTradePaymentTerms = [];

    #[Type(TradeSettlementHeaderMonetarySummation::class)]
    #[SerializedName('SpecifiedTradeSettlementHeaderMonetarySummation')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public TradeSettlementHeaderMonetarySummation $specifiedTradeSettlementHeaderMonetarySummation;

    #[Type(ReferencedDocument::class)]
    #[SerializedName('InvoiceReferencedDocument')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ReferencedDocument $invoiceReferencedDocument = null;

    /**
     * @var TradeAccountingAccount[]
     */
    #[Type('array<' . TradeAccountingAccount::class . '>')]
    #[XmlList(inline: true, entry: 'ReceivableSpecifiedTradeAccountingAccount', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $tradeAccountingAccount = [];
}
