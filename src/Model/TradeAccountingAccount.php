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
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;

class TradeAccountingAccount
{
    /**
     * @Type("Easybill\ZUGFeRD\Model\Id")
     *
     * @XmlElement(cdata=false, namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     *
     * @SerializedName("ID")
     */
    public Id $id;

    /**
     * @JMS\Type("string")
     *
     * @JMS\XmlElement(cdata=false, namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100")
     *
     * @JMS\SerializedName("TypeCode")
     */
    public ?string $typeCode = null;
}
