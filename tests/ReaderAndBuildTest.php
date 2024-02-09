<?php

declare(strict_types=1);

/*
 * This file is part of the ZUGFeRD PHP package.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Easybill\ZUGFeRD\Tests;

use DOMDocument;
use Easybill\ZUGFeRD\Builder;
use Easybill\ZUGFeRD\Reader;
use PHPUnit\Framework\TestCase;

class ReaderAndBuildTest extends TestCase
{
    public static function orderCrossIndustryInvoiceAttributes(string $xml): string
    {
        return (string) preg_replace_callback('/<rsm:CrossIndustryInvoice (((xmlns:(\w)+="[^"]+")\s*)+)>/', function (array $matches) {
            $parts = explode(' ', $matches[1]);

            foreach ($parts as $i => $part) {
                // Some french PDF have xmlns:xsi instead of xs
                if (str_starts_with($part, 'xmlns:xs')) {
                    unset($parts[$i]);
                }
            }

            sort($parts);

            return sprintf('<rsm:CrossIndustryInvoice %s>', implode(' ', $parts));
        }, $xml);
    }

    public static function reformatXml(string $xml): string
    {
        $xml = (string) preg_replace('/<!--(.|\s)*?-->/', '', $xml);

        $doc = new DOMDocument('1.0', 'UTF-8');
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        $doc->loadXML($xml);

        return self::orderCrossIndustryInvoiceAttributes((string) $doc->saveXML());
    }

    /** @dataProvider dataProvider */
    public function testGetDocument(string $filename): void
    {
        $xml = file_get_contents(__DIR__ . '/data/official_example_xml/' . $filename);
        self::assertNotFalse($xml);
        $obj = Reader::create()->transform($xml);
        $str = Builder::create()->transform($obj);

        self::assertSame(
            self::reformatXml($xml),
            self::reformatXml($str),
        );

        self::assertTrue(true);
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function dataProvider(): array
    {
        return [
            // 2.1.1
            ['2.1/zugferd_2p1_BASIC-WL_Einfach.xml'],
            ['2.1/zugferd_2p1_EN16931_Einfach.xml'],
            ['2.1/zugferd_2p1_XRECHNUNG_Einfach.xml'],
            // 2.2 DE
            ['2.2/BASIC WL/BASIC-WL_Einfach.xml'],
            ['2.2/BASIC/BASIC_Einfach.xml'],
            ['2.2/BASIC/BASIC_Rechnungskorrektur.xml'],
            ['2.2/BASIC/BASIC_Taxifahrt.xml'],
            ['2.2/EN16931/EN16931_1_Teilrechnung.xml'],
            ['2.2/EN16931/EN16931_2_Teilrechnung.xml'],
            ['2.2/EN16931/EN16931_AbweichenderZahlungsempf.xml'],
            ['2.2/EN16931/EN16931_Einfach.xml'],
            ['2.2/EN16931/EN16931_Einfach_DueDate.xml'],
            ['2.2/EN16931/EN16931_Einfach_negativePaymentDue.xml'],
            ['2.2/EN16931/EN16931_ElektronischeAdresse.xml'],
            ['2.2/EN16931/EN16931_Gutschrift.xml'],
            ['2.2/EN16931/EN16931_Haftpflichtversicherung_Versicherungssteuer.xml'],
            ['2.2/EN16931/EN16931_Innergemeinschaftliche_Lieferungen.xml'],
            ['2.2/EN16931/EN16931_Kraftfahrversicherung_Bruttopreise.xml'],
            ['2.2/EN16931/EN16931_Miete.xml'],
            ['2.2/EN16931/EN16931_OEPNV.xml'],
            ['2.2/EN16931/EN16931_Physiotherapeut.xml'],
            ['2.2/EN16931/EN16931_Rabatte.xml'],
            ['2.2/EN16931/EN16931_RechnungsUebertragung.xml'],
            ['2.2/EN16931/EN16931_Rechnungskorrektur.xml'],
            ['2.2/EN16931/EN16931_SEPA_Prenotification.xml'],
            ['2.2/EN16931/EN16931_Sachversicherung_berechneter_Steuersatz.xml'],
            ['2.2/EXTENDED/EXTENDED_Fremdwaehrung.xml'],
            ['2.2/EXTENDED/EXTENDED_InnergemeinschLieferungMehrereBestellungen.xml'],
            ['2.2/EXTENDED/EXTENDED_Kostenrechnung.xml'],
            ['2.2/EXTENDED/EXTENDED_Rechnungskorrektur.xml'],
            ['2.2/EXTENDED/EXTENDED_Warenrechnung.xml'],
            ['2.2/MINIMUM/MINIMUM_Buchungshilfe.xml'],
            ['2.2/MINIMUM/MINIMUM_Rechnung.xml'],
            // 2.2 FR
            ['2.2/MINIMUM/Facture_F20220023-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220024-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220025-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220026-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220027-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220028-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220029-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220030-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_F20220031-LE_FOURNISSEUR-POUR-LE_CLIENT_MINIMUM.xml'],
            ['2.2/MINIMUM/Avoir_FR_type380_MINIMUM.xml'],
            ['2.2/MINIMUM/Avoir_FR_type381_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_DOM_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_FR_MINIMUM.xml'],
            ['2.2/MINIMUM/Facture_UE_MINIMUM.xml'],
            ['2.2/BASIC WL/Facture_F20220023-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220024-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220025-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220026-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220027-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220028-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220029-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220030-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Facture_F20220031-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC_WL.xml'],
            ['2.2/BASIC WL/Avoir_FR_type380_BASICWL.xml'],
            ['2.2/BASIC WL/Avoir_FR_type381_BASICWL.xml'],
            ['2.2/BASIC WL/Facture_DOM_BASICWL.xml'],
            ['2.2/BASIC WL/Facture_FR_BASICWL.xml'],
            ['2.2/BASIC WL/Facture_UE_BASICWL.xml'],
            ['2.2/BASIC/Facture_F20220023-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220024-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220025-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220026-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220027-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220028-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220029-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220030-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Facture_F20220031-LE_FOURNISSEUR-POUR-LE_CLIENT_BASIC.xml'],
            ['2.2/BASIC/Avoir_FR_type380_BASIC.xml'],
            ['2.2/BASIC/Avoir_FR_type381_BASIC.xml'],
            ['2.2/BASIC/Facture_DOM_BASIC.xml'],
            ['2.2/BASIC/Facture_FR_BASIC.xml'],
            ['2.2/BASIC/Facture_UE_BASIC.xml'],
            ['2.2/EN16931/Facture_F20220023-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220024-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220025-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220026-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220027-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220028-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220029-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220030-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Facture_F20220031-LE_FOURNISSEUR-POUR-LE_CLIENT_EN_16931.xml'],
            ['2.2/EN16931/Avoir_FR_type380_EN16931.xml'],
            ['2.2/EN16931/Avoir_FR_type381_EN16931.xml'],
            ['2.2/EN16931/Facture_DOM_EN16931.xml'],
            ['2.2/EN16931/Facture_FR_EN16931.xml'],
            ['2.2/EN16931/Facture_UE_EN16931.xml'],
            ['2.2/EXTENDED/Facture_F20220023-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220024-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220025-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220026-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220027-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220028-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220029-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220030-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_F20220031-LE_FOURNISSEUR-POUR-LE_CLIENT_EXTENDED.xml'],
            ['2.2/EXTENDED/Avoir_FR_type380_EXTENDED.xml'],
            ['2.2/EXTENDED/Avoir_FR_type381_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_DOM_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_FR_EXTENDED.xml'],
            ['2.2/EXTENDED/Facture_UE_EXTENDED.xml'],
        ];
    }
}
