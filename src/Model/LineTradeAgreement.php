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

class LineTradeAgreement
{
    #[Type(ReferencedDocument::class)]
    #[SerializedName('BuyerOrderReferencedDocument')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ReferencedDocument $buyerOrderReferencedDocument = null;

    #[Type(ReferencedDocument::class)]
    #[SerializedName('QuotationReferencedDocument')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ReferencedDocument $quotationReferencedDocument = null;

    #[Type(ReferencedDocument::class)]
    #[SerializedName('ContractReferencedDocument')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?ReferencedDocument $contractReferencedDocument = null;

    /**
     * @var ReferencedDocument[]
     */
    #[Type('array<Easybill\ZUGFeRD\Model\ReferencedDocument>')]
    #[XmlList(inline: true, entry: 'AdditionalReferencedDocument', namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public array $additionalReferencedDocuments = [];

    #[Type(TradePrice::class)]
    #[SerializedName('GrossPriceProductTradePrice')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public ?TradePrice $grossPrice = null;

    #[Type(TradePrice::class)]
    #[SerializedName('NetPriceProductTradePrice')]
    #[XmlElement(cdata: false, namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100')]
    public TradePrice $netPrice;
}
