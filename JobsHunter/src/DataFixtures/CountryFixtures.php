<?php
namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture{
    public const ALBANIA_REF = "albania-country"; 
    public const ALGERIA_REF = "algeria-country"; 
    public const AMERICAN_SAMOA_REF = "american_samoa-country"; 
    public const ANDORRA_REF = "andorra-country"; 
    public const ANGOLA_REF = "angola-country"; 
    public const ANGUILLA_REF = "anguilla-country"; 
    public const ANTARCTICA_REF = "antarctica-country"; 
    public const ANTIGUA_AND_BARBUDA_REF = "antigua_and_barbuda-country"; 
    public const ARGENTINA_REF = "argentina-country"; 
    public const ARMENIA_REF = "armenia-country"; 
    public const ARUBA_REF = "aruba-country"; 
    public const AUSTRALIA_REF = "australia-country"; 
    public const AUSTRIA_REF = "austria-country"; 
    public const AZERBAIJAN_REF = "azerbaijan-country"; 
    public const BAHAMAS_REF = "bahamas-country"; 
    public const BAHRAIN_REF = "bahrain-country"; 
    public const BANGLADESH_REF = "bangladesh-country"; 
    public const BARBADOS_REF = "barbados-country"; 
    public const BELARUS_REF = "belarus-country"; 
    public const BELGIUM_REF = "belgium-country"; 
    public const BELIZE_REF = "belize-country"; 
    public const BENIN_REF = "benin-country"; 
    public const BERMUDA_REF = "bermuda-country"; 
    public const BHUTAN_REF = "bhutan-country"; 
    public const BOLIVIA_REF = "bolivia-country"; 
    public const BOSNIA_AND_HERZEGOVINA_REF = "bosnia_and_herzegovina-country"; 
    public const BOTSWANA_REF = "botswana-country"; 
    public const BOUVET_ISLAND_REF = "bouvet_island-country"; 
    public const BRAZIL_REF = "brazil-country"; 
    public const BRITISH_INDIAN_OCEAN_TERRITORY_REF = "british_indian_ocean_territory-country"; 
    public const BRUNEI_DARUSSALAM_REF = "brunei_darussalam-country"; 
    public const BULGARIA_REF = "bulgaria-country"; 
    public const BURKINA_FASO_REF = "burkina_faso-country"; 
    public const BURUNDI_REF = "burundi-country"; 
    public const CAMBODIA_REF = "cambodia-country"; 
    public const CAMEROON_REF = "cameroon-country"; 
    public const CANADA_REF = "canada-country"; 
    public const CAPE_VERDE_REF = "cape_verde-country"; 
    public const CAYMAN_ISLANDS_REF = "cayman_islands-country"; 
    public const CENTRAL_AFRICAN_REPUBLIC_REF = "central_african_republic-country"; 
    public const CHAD_REF = "chad-country"; 
    public const CHILE_REF = "chile-country"; 
    public const CHINA_REF = "china-country"; 
    public const CHRISTMAS_ISLAND_REF = "christmas_island-country"; 
    public const COCOS_ISLANDS_REF = "cocos_islands-country"; 
    public const COLOMBIA_REF = "colombia-country"; 
    public const COMOROS_REF = "comoros-country"; 
    public const CONGO_REF = "congo-country"; 
    public const CONGO_DEMOCRATIC_REPUBLIC_REF = "congo_democratic_republic-country"; 
    public const COOK_ISLANDS_REF = "cook_islands-country"; 
    public const COSTA_RICA_REF = "costa_rica-country"; 
    public const COTE_DIVOIRE_REF = "cote_divoire-country"; 
    public const CROATIA_REF = "croatia-country"; 
    public const CUBA_REF = "cuba-country"; 
    public const CYPRUS_REF = "cyprus-country"; 
    public const CZECH_REPUBLIC_REF = "czech_republic-country"; 
    public const DENMARK_REF = "denmark-country"; 
    public const DJIBOUTI_REF = "djibouti-country"; 
    public const DOMINICA_REF = "dominica-country"; 
    public const DOMINICAN_REPUBLIC_REF = "dominican_republic-country"; 
    public const ECUADOR_REF = "ecuador-country"; 
    public const EGYPT_REF = "egypt-country"; 
    public const EL_SALVADOR_REF = "el_salvador-country"; 
    public const EQUATORIAL_GUINEA_REF = "equatorial_guinea-country"; 
    public const ERITREA_REF = "eritrea-country"; 
    public const ESTONIA_REF = "estonia-country"; 
    public const ETHIOPIA_REF = "ethiopia-country"; 
    public const FALKLAND_ISLANDS_REF = "falkland_islands-country"; 
    public const FAROE_ISLANDS_REF = "faroe_islands-country"; 
    public const FIJI_REF = "fiji-country"; 
    public const FINLAND_REF = "finland-country"; 
    public const FRANCE_REF = "france-country"; 
    public const FRENCH_GUIANA_REF = "french_guiana-country"; 
    public const FRENCH_POLYNESIA_REF = "french_polynesia-country"; 
    public const FRENCH_SOUTHERN_TERRITORIES_REF = "french_southern_territories-country"; 
    public const GABON_REF = "gabon-country"; 
    public const GAMBIA_REF = "gambia-country"; 
    public const GEORGIA_REF = "georgia-country"; 
    public const GERMANY_REF = "germany-country"; 
    public const GHANA_REF = "ghana-country"; 
    public const GIBRALTAR_REF = "gibraltar-country"; 
    public const GREECE_REF = "greece-country"; 
    public const GREENLAND_REF = "greenland-country"; 
    public const GRENADA_REF = "grenada-country"; 
    public const GUADELOUPE_REF = "guadeloupe-country"; 
    public const GUAM_REF = "guam-country"; 
    public const GUATEMALA_REF = "guatemala-country"; 
    public const GUINEA_REF = "guinea-country"; 
    public const GUINEA_BISSAU_REF = "guinea_bissau-country"; 
    public const GUYANA_REF = "guyana-country"; 
    public const HAITI_REF = "haiti-country"; 
    public const HEARD_ISLAND_AND_MCDONALD_ISLANDS_REF = "heard_island_and_mcdonald_islands-country"; 
    public const HOLY_SEE_REF = "holy_see-country"; 
    public const HONDURAS_REF = "honduras-country"; 
    public const HONG_KONG_REF = "hong_kong-country"; 
    public const HUNGARY_REF = "hungary-country"; 
    public const ICELAND_REF = "iceland-country"; 
    public const INDIA_REF = "india-country"; 
    public const INDONESIA_REF = "indonesia-country"; 
    public const IRAN_REF = "iran-country"; 
    public const IRAQ_REF = "iraq-country"; 
    public const IRELAND_REF = "ireland-country"; 
    public const ISRAEL_REF = "israel-country"; 
    public const ITALY_REF = "italy-country"; 
    public const JAMAICA_REF = "jamaica-country"; 
    public const JAPAN_REF = "japan-country"; 
    public const JORDAN_REF = "jordan-country"; 
    public const KAZAKHSTAN_REF = "kazakhstan-country"; 
    public const KENYA_REF = "kenya-country"; 
    public const KIRIBATI_REF = "kiribati-country"; 
    public const KOREA_DEMOCRATIC_REF = "korea_democratic-country"; 
    public const KOREA_REPUBLIC_REF = "korea_republic-country"; 
    public const KUWAIT_REF = "kuwait-country"; 
    public const KYRGYZSTAN_REF = "kyrgyzstan-country"; 
    public const LAO_REF = "lao-country"; 
    public const LATVIA_REF = "latvia-country"; 
    public const LEBANON_REF = "lebanon-country"; 
    public const LESOTHO_REF = "lesotho-country"; 
    public const LIBERIA_REF = "liberia-country"; 
    public const LIBYAN_REF = "libyan-country"; 
    public const LIECHTENSTEIN_REF = "liechtenstein-country"; 
    public const LITHUANIA_REF = "lithuania-country"; 
    public const LUXEMBOURG_REF = "luxembourg-country"; 
    public const MACAO_REF = "macao-country"; 
    public const MACEDONIA_REF = "macedonia-country"; 
    public const MADAGASCAR_REF = "madagascar-country"; 
    public const MALAWI_REF = "malawi-country"; 
    public const MALAYSIA_REF = "malaysia-country"; 
    public const MALDIVES_REF = "maldives-country"; 
    public const MALI_REF = "mali-country"; 
    public const MALTA_REF = "malta-country"; 
    public const MARSHALL_REF = "marshall-country"; 
    public const MARTINIQUE_REF = "martinique-country"; 
    public const MAURITANIA_REF = "mauritania-country"; 
    public const MAURITIUS_REF = "mauritius-country"; 
    public const MAYOTTE_REF = "mayotte-country"; 
    public const MEXICO_REF = "mexico-country"; 
    public const MICRONESIA_REF = "micronesia-country"; 
    public const MOLDOVA_REF = "moldova-country"; 
    public const MONACO_REF = "monaco-country"; 
    public const MONGOLIA_REF = "mongolia-country"; 
    public const MONTSERRAT_REF = "montserrat-country"; 
    public const MOROCCO_REF = "morocco-country"; 
    public const MOZAMBIQUE_REF = "mozambique-country"; 
    public const MYANMAR_REF = "myanmar-country"; 
    public const NAMIBIA_REF = "namibia-country"; 
    public const NAURU_REF = "nauru-country"; 
    public const NEPAL_REF = "nepal-country"; 
    public const NETHERLANDS_ANTILLES_REF = "netherlands-antilles-country"; 
    public const NETHERLANDS_REF = "netherlands-country";
    public const NEW_CALEDONIA_REF = "new-country"; 
    public const NEW_ZEALAND_REF = "new-country"; 
    public const NICARAGUA_REF = "nicaragua-country"; 
    public const NIGER_REF = "niger-country"; 
    public const NIGERIA_REF = "nigeria-country"; 
    public const NIUE_REF = "niue-country"; 
    public const NORFOLK_REF = "norfolk-country"; 
    public const NORTHERN_REF = "northern-country"; 
    public const NORWAY_REF = "norway-country"; 
    public const OMAN_REF = "oman-country"; 
    public const PAKISTAN_REF = "pakistan-country"; 
    public const PALAU_REF = "palau-country"; 
    public const PALESTINIAN_REF = "palestinian-country"; 
    public const PANAMA_REF = "panama-country"; 
    public const PAPUA_REF = "papua-country"; 
    public const PARAGUAY_REF = "paraguay-country"; 
    public const PERU_REF = "peru-country"; 
    public const PHILIPPINES_REF = "philippines-country"; 
    public const PITCAIRN_REF = "pitcairn-country"; 
    public const POLAND_REF = "poland-country"; 
    public const PORTUGAL_REF = "portugal-country"; 
    public const PUERTO_REF = "puerto-country"; 
    public const QATAR_REF = "qatar-country"; 
    public const REUNION_REF = "reunion-country"; 
    public const ROMANIA_REF = "romania-country"; 
    public const RUSSIAN_REF = "russian-country"; 
    public const RWANDA_REF = "rwanda-country"; 
    public const SAINT_HELENA_REF = "saint_helena-country"; 
    public const SAINT_KITTS_REF = "saint_kitts-country"; 
    public const SAINT_LUCIA_REF = "saint_lucia-country"; 
    public const SAINT_PIERE_REF = "saint_piere-country"; 
    public const SAINT_VINCENT_REF = "saint_vincent-country"; 
    public const SAMOA_REF = "samoa-country"; 
    public const SAN_MARINO_REF = "san_marino-country"; 
    public const SAO_TOME_REF = "sao_tome-country"; 
    public const SAUDI_REF = "saudi-country"; 
    public const SENEGAL_REF = "senegal-country"; 
    public const SERBIA_REF = "serbia-country"; 
    public const SEYCHELLES_REF = "seychelles-country"; 
    public const SIERRA_REF = "sierra-country"; 
    public const SINGAPORE_REF = "singapore-country"; 
    public const SLOVAKIA_REF = "slovakia-country"; 
    public const SLOVENIA_REF = "slovenia-country"; 
    public const SOLOMON_REF = "solomon-country"; 
    public const SOMALIA_REF = "somalia-country"; 
    public const SOUTH_AFRICA_REF = "south_africa-country"; 
    public const SOUTH_GEORGIA_REF = "south_georgia-country"; 
    public const SPAIN_REF = "spain-country"; 
    public const SRI_LANKA_REF = "sri_lanka-country"; 
    public const SUDAN_REF = "sudan-country"; 
    public const SURINAME_REF = "suriname-country"; 
    public const SVALBARD_REF = "svalbard-country"; 
    public const SWAZILAND_REF = "swaziland-country"; 
    public const SWEDEN_REF = "sweden-country"; 
    public const SWITZERLAND_REF = "switzerland-country"; 
    public const SYRIAN_REF = "syrian-country"; 
    public const TAIWAN_REF = "taiwan-country"; 
    public const TAJIKISTAN_REF = "tajikistan-country"; 
    public const TANZANIA_REF = "tanzania-country"; 
    public const THAILAND_REF = "thailand-country"; 
    public const TIMOR_LESTE_REF = "timor_leste-country"; 
    public const TOGO_REF = "togo-country"; 
    public const TOKELAU_REF = "tokelau-country"; 
    public const TONGA_REF = "tonga-country"; 
    public const TRINIDAD_REF = "trinidad-country"; 
    public const TUNISIA_REF = "tunisia-country"; 
    public const TURKEY_REF = "turkey-country"; 
    public const TURKMENISTAN_REF = "turkmenistan-country"; 
    public const TURKS_REF = "turks-country"; 
    public const TUVALU_REF = "tuvalu-country"; 
    public const UGANDA_REF = "uganda-country"; 
    public const UKRAINE_REF = "ukraine-country"; 
    public const UAE_REF = "uae-country"; 
    public const UK_REF = "uk-country"; 
    public const US_REF = "us-country"; 
    public const US_MINOR_REF = "us_minor-country"; 
    public const URUGUAY_REF = "uruguay-country"; 
    public const UZBEKISTAN_REF = "uzbekistan-country"; 
    public const VANUATU_REF = "vanuatu-country"; 
    public const VENEZUELA_REF = "venezuela-country"; 
    public const VIET_NAM_REF = "viet_nam-country"; 
    public const VIRGIN_ISLANDS_BRITISH_REF = "virgin_islands_british-country"; 
    public const VIRGIN_ISLANDS_US_REF = "virgin_islands_us-country"; 
    public const WALLIS_FUTUNA_REF = "wallis_futuna-country"; 
    public const WESTERN_SAHARA_REF = "western_sahara-country"; 
    public const YEMEN_REF = "yemen-country"; 
    public const ZAMBIA_REF = "zambia-country"; 
    public const ZIMBABWE_REF = "zimbabwe-country"; 

    public function load(ObjectManager $manager){
        // $afghanistan = new Country();
        // $afghanistan->setIso("Af")
        // ->setName("AFGHANISTAN")
        // ->setNiceName("Afghanistan")
        // ->setIso3("AFG")
        // ->setNumCode(4)
        // ->setPhoneCode(93);

        $afghanistan = new Country();
        $afghanistan->setIso("AF")
        ->setName("AFGHANISTAN")
        ->setNiceName("Afghanistan")
        ->setIso3("AFG")
        ->setNumCode(4)
        ->setPhoneCode(93);


        $albania = new Country();
        $albania->setIso("AL")
        ->setName("ALBANIA")
        ->setNiceName("Albania")
        ->setIso3("ALB")
        ->setNumCode(8)
        ->setPhoneCode(355);


        $algeria = new Country();
        $algeria->setIso("DZ")
        ->setName("ALGERIA")
        ->setNiceName("Algeria")
        ->setIso3("DZA")
        ->setNumCode(12)
        ->setPhoneCode(213);


        $american_samoa = new Country();
        $american_samoa->setIso("AS")
        ->setName("AMERICAN SAMOA")
        ->setNiceName("American Samoa")
        ->setIso3("ASM")
        ->setNumCode(16)
        ->setPhoneCode(1684);


        $andorra = new Country();
        $andorra->setIso("AD")
        ->setName("ANDORRA")
        ->setNiceName("Andorra")
        ->setIso3("AND")
        ->setNumCode(20)
        ->setPhoneCode(376);


        $angola = new Country();
        $angola->setIso("AO")
        ->setName("ANGOLA")
        ->setNiceName("Angola")
        ->setIso3("AGO")
        ->setNumCode(24)
        ->setPhoneCode(244);


        $anguilla = new Country();
        $anguilla->setIso("AI")
        ->setName("ANGUILLA")
        ->setNiceName("Anguilla")
        ->setIso3("AIA")
        ->setNumCode(660)
        ->setPhoneCode(1264);


        $antarctica = new Country();
        $antarctica->setIso("AQ")
        ->setName("ANTARCTICA")
        ->setNiceName("Antarctica")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(0);


        $antigua_and_barbuda = new Country();
        $antigua_and_barbuda->setIso("AG")
        ->setName("ANTIGUA AND BARBUDA")
        ->setNiceName("Antigua and Barbuda")
        ->setIso3("ATG")
        ->setNumCode(28)
        ->setPhoneCode(1268);


        $argentina = new Country();
        $argentina->setIso("AR")
        ->setName("ARGENTINA")
        ->setNiceName("Argentina")
        ->setIso3("ARG")
        ->setNumCode(32)
        ->setPhoneCode(54);


        $armenia = new Country();
        $armenia->setIso("AM")
        ->setName("ARMENIA")
        ->setNiceName("Armenia")
        ->setIso3("ARM")
        ->setNumCode(51)
        ->setPhoneCode(374);


        $aruba = new Country();
        $aruba->setIso("AW")
        ->setName("ARUBA")
        ->setNiceName("Aruba")
        ->setIso3("ABW")
        ->setNumCode(533)
        ->setPhoneCode(297);


        $australia = new Country();
        $australia->setIso("AU")
        ->setName("AUSTRALIA")
        ->setNiceName("Australia")
        ->setIso3("AUS")
        ->setNumCode(36)
        ->setPhoneCode(61);


        $austria = new Country();
        $austria->setIso("AT")
        ->setName("AUSTRIA")
        ->setNiceName("Austria")
        ->setIso3("AUT")
        ->setNumCode(40)
        ->setPhoneCode(43);


        $azerbaijan = new Country();
        $azerbaijan->setIso("AZ")
        ->setName("AZERBAIJAN")
        ->setNiceName("Azerbaijan")
        ->setIso3("AZE")
        ->setNumCode(31)
        ->setPhoneCode(994);


        $bahamas = new Country();
        $bahamas->setIso("BS")
        ->setName("BAHAMAS")
        ->setNiceName("Bahamas")
        ->setIso3("BHS")
        ->setNumCode(44)
        ->setPhoneCode(1242);


        $bahrain = new Country();
        $bahrain->setIso("BH")
        ->setName("BAHRAIN")
        ->setNiceName("Bahrain")
        ->setIso3("BHR")
        ->setNumCode(48)
        ->setPhoneCode(973);


        $bangladesh = new Country();
        $bangladesh->setIso("BD")
        ->setName("BANGLADESH")
        ->setNiceName("Bangladesh")
        ->setIso3("BGD")
        ->setNumCode(50)
        ->setPhoneCode(880);


        $barbados = new Country();
        $barbados->setIso("BB")
        ->setName("BARBADOS")
        ->setNiceName("Barbados")
        ->setIso3("BRB")
        ->setNumCode(52)
        ->setPhoneCode(1246);


        $belarus = new Country();
        $belarus->setIso("BY")
        ->setName("BELARUS")
        ->setNiceName("Belarus")
        ->setIso3("BLR")
        ->setNumCode(112)
        ->setPhoneCode(375);


        $belgium = new Country();
        $belgium->setIso("BE")
        ->setName("BELGIUM")
        ->setNiceName("Belgium")
        ->setIso3("BEL")
        ->setNumCode(56)
        ->setPhoneCode(32);


        $belize = new Country();
        $belize->setIso("BZ")
        ->setName("BELIZE")
        ->setNiceName("Belize")
        ->setIso3("BLZ")
        ->setNumCode(84)
        ->setPhoneCode(501);


        $benin = new Country();
        $benin->setIso("BJ")
        ->setName("BENIN")
        ->setNiceName("Benin")
        ->setIso3("BEN")
        ->setNumCode(204)
        ->setPhoneCode(229);


        $bermuda = new Country();
        $bermuda->setIso("BM")
        ->setName("BERMUDA")
        ->setNiceName("Bermuda")
        ->setIso3("BMU")
        ->setNumCode(60)
        ->setPhoneCode(1441);


        $bhutan = new Country();
        $bhutan->setIso("BT")
        ->setName("BHUTAN")
        ->setNiceName("Bhutan")
        ->setIso3("BTN")
        ->setNumCode(64)
        ->setPhoneCode(975);


        $bolivia = new Country();
        $bolivia->setIso("BO")
        ->setName("BOLIVIA")
        ->setNiceName("Bolivia")
        ->setIso3("BOL")
        ->setNumCode(68)
        ->setPhoneCode(591);


        $bosnia_and_herzegovina = new Country();
        $bosnia_and_herzegovina->setIso("BA")
        ->setName("BOSNIA AND HERZEGOVINA")
        ->setNiceName("Bosnia and Herzegovina")
        ->setIso3("BIH")
        ->setNumCode(70)
        ->setPhoneCode(387);


        $botswana = new Country();
        $botswana->setIso("BW")
        ->setName("BOTSWANA")
        ->setNiceName("Botswana")
        ->setIso3("BWA")
        ->setNumCode(72)
        ->setPhoneCode(267);


        $bouvet_island = new Country();
        $bouvet_island->setIso("BV")
        ->setName("BOUVET ISLAND")
        ->setNiceName("Bouvet Island")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(0);


        $brazil = new Country();
        $brazil->setIso("BR")
        ->setName("BRAZIL")
        ->setNiceName("Brazil")
        ->setIso3("BRA")
        ->setNumCode(76)
        ->setPhoneCode(55);


        $british_indian_ocean_territory = new Country();
        $british_indian_ocean_territory->setIso("IO")
        ->setName("BRITISH INDIAN OCEAN TERRITORY")
        ->setNiceName("British Indian Ocean Territory")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(246);


        $brunei_darussalam = new Country();
        $brunei_darussalam->setIso("BN")
        ->setName("BRUNEI DARUSSALAM")
        ->setNiceName("Brunei Darussalam")
        ->setIso3("BRN")
        ->setNumCode(96)
        ->setPhoneCode(673);


        $bulgaria = new Country();
        $bulgaria->setIso("BG")
        ->setName("BULGARIA")
        ->setNiceName("Bulgaria")
        ->setIso3("BGR")
        ->setNumCode(100)
        ->setPhoneCode(359);


        $burkina_faso = new Country();
        $burkina_faso->setIso("BF")
        ->setName("BURKINA FASO")
        ->setNiceName("Burkina Faso")
        ->setIso3("BFA")
        ->setNumCode(854)
        ->setPhoneCode(226);


        $burundi = new Country();
        $burundi->setIso("BI")
        ->setName("BURUNDI")
        ->setNiceName("Burundi")
        ->setIso3("BDI")
        ->setNumCode(108)
        ->setPhoneCode(257);


        $cambodia = new Country();
        $cambodia->setIso("KH")
        ->setName("CAMBODIA")
        ->setNiceName("Cambodia")
        ->setIso3("KHM")
        ->setNumCode(116)
        ->setPhoneCode(855);


        $cameroon = new Country();
        $cameroon->setIso("CM")
        ->setName("CAMEROON")
        ->setNiceName("Cameroon")
        ->setIso3("CMR")
        ->setNumCode(120)
        ->setPhoneCode(237);


        $canada = new Country();
        $canada->setIso("CA")
        ->setName("CANADA")
        ->setNiceName("Canada")
        ->setIso3("CAN")
        ->setNumCode(124)
        ->setPhoneCode(1);


        $cape_verde = new Country();
        $cape_verde->setIso("CV")
        ->setName("CAPE VERDE")
        ->setNiceName("Cape Verde")
        ->setIso3("CPV")
        ->setNumCode(132)
        ->setPhoneCode(238);


        $cayman_islands = new Country();
        $cayman_islands->setIso("KY")
        ->setName("CAYMAN ISLANDS")
        ->setNiceName("Cayman Islands")
        ->setIso3("CYM")
        ->setNumCode(136)
        ->setPhoneCode(1345);


        $central_african_republic = new Country();
        $central_african_republic->setIso("CF")
        ->setName("CENTRAL AFRICAN REPUBLIC")
        ->setNiceName("Central African Republic")
        ->setIso3("CAF")
        ->setNumCode(140)
        ->setPhoneCode(236);


        $chad = new Country();
        $chad->setIso("TD")
        ->setName("CHAD")
        ->setNiceName("Chad")
        ->setIso3("TCD")
        ->setNumCode(148)
        ->setPhoneCode(235);


        $chile = new Country();
        $chile->setIso("CL")
        ->setName("CHILE")
        ->setNiceName("Chile")
        ->setIso3("CHL")
        ->setNumCode(152)
        ->setPhoneCode(56);


        $china = new Country();
        $china->setIso("CN")
        ->setName("CHINA")
        ->setNiceName("China")
        ->setIso3("CHN")
        ->setNumCode(156)
        ->setPhoneCode(86);


        $christmas_island = new Country();
        $christmas_island->setIso("CX")
        ->setName("CHRISTMAS ISLAND")
        ->setNiceName("Christmas Island")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(61);


        $cocos_islands = new Country();
        $cocos_islands->setIso("CC")
        ->setName("COCOS (KEELING) ISLANDS")
        ->setNiceName("Cocos (Keeling) Islands")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(672);


        $colombia = new Country();
        $colombia->setIso("CO")
        ->setName("COLOMBIA")
        ->setNiceName("Colombia")
        ->setIso3("COL")
        ->setNumCode(170)
        ->setPhoneCode(57);


        $comoros = new Country();
        $comoros->setIso("KM")
        ->setName("COMOROS")
        ->setNiceName("Comoros")
        ->setIso3("COM")
        ->setNumCode(174)
        ->setPhoneCode(269);


        $congo = new Country();
        $congo->setIso("CG")
        ->setName("CONGO")
        ->setNiceName("Congo")
        ->setIso3("COG")
        ->setNumCode(178)
        ->setPhoneCode(242);


        $congo_democratic_republic = new Country();
        $congo_democratic_republic->setIso("CD")
        ->setName("CONGO, THE DEMOCRATIC REPUBLIC OF THE")
        ->setNiceName("Congo, the Democratic Republic of the")
        ->setIso3("COD")
        ->setNumCode(180)
        ->setPhoneCode(242);


        $cook_islands = new Country();
        $cook_islands->setIso("CK")
        ->setName("COOK ISLANDS")
        ->setNiceName("Cook Islands")
        ->setIso3("COK")
        ->setNumCode(184)
        ->setPhoneCode(682);


        $costa_rica = new Country();
        $costa_rica->setIso("CR")
        ->setName("COSTA RICA")
        ->setNiceName("Costa Rica")
        ->setIso3("CRI")
        ->setNumCode(188)
        ->setPhoneCode(506);


        $cote_divoire = new Country();
        $cote_divoire->setIso("CI")
        ->setName("COTE DIVOIRE")
        ->setNiceName("Cote DIvoire")
        ->setIso3("CIV")
        ->setNumCode(384)
        ->setPhoneCode(225);


        $croatia = new Country();
        $croatia->setIso("HR")
        ->setName("CROATIA")
        ->setNiceName("Croatia")
        ->setIso3("HRV")
        ->setNumCode(191)
        ->setPhoneCode(385);


        $cuba = new Country();
        $cuba->setIso("CU")
        ->setName("CUBA")
        ->setNiceName("Cuba")
        ->setIso3("CUB")
        ->setNumCode(192)
        ->setPhoneCode(53);


        $cyprus = new Country();
        $cyprus->setIso("CY")
        ->setName("CYPRUS")
        ->setNiceName("Cyprus")
        ->setIso3("CYP")
        ->setNumCode(196)
        ->setPhoneCode(357);


        $czech_republic = new Country();
        $czech_republic->setIso("CZ")
        ->setName("CZECH REPUBLIC")
        ->setNiceName("Czech Republic")
        ->setIso3("CZE")
        ->setNumCode(203)
        ->setPhoneCode(420);


        $denmark = new Country();
        $denmark->setIso("DK")
        ->setName("DENMARK")
        ->setNiceName("Denmark")
        ->setIso3("DNK")
        ->setNumCode(208)
        ->setPhoneCode(45);


        $djibouti = new Country();
        $djibouti->setIso("DJ")
        ->setName("DJIBOUTI")
        ->setNiceName("Djibouti")
        ->setIso3("DJI")
        ->setNumCode(262)
        ->setPhoneCode(253);


        $dominica = new Country();
        $dominica->setIso("DM")
        ->setName("DOMINICA")
        ->setNiceName("Dominica")
        ->setIso3("DMA")
        ->setNumCode(212)
        ->setPhoneCode(1767);


        $dominican_republic = new Country();
        $dominican_republic->setIso("DO")
        ->setName("DOMINICAN REPUBLIC")
        ->setNiceName("Dominican Republic")
        ->setIso3("DOM")
        ->setNumCode(214)
        ->setPhoneCode(1809);


        $ecuador = new Country();
        $ecuador->setIso("EC")
        ->setName("ECUADOR")
        ->setNiceName("Ecuador")
        ->setIso3("ECU")
        ->setNumCode(218)
        ->setPhoneCode(593);


        $egypt = new Country();
        $egypt->setIso("EG")
        ->setName("EGYPT")
        ->setNiceName("Egypt")
        ->setIso3("EGY")
        ->setNumCode(818)
        ->setPhoneCode(20);


        $el_salvador = new Country();
        $el_salvador->setIso("SV")
        ->setName("EL SALVADOR")
        ->setNiceName("El Salvador")
        ->setIso3("SLV")
        ->setNumCode(222)
        ->setPhoneCode(503);


        $equatorial_guinea = new Country();
        $equatorial_guinea->setIso("GQ")
        ->setName("EQUATORIAL GUINEA")
        ->setNiceName("Equatorial Guinea")
        ->setIso3("GNQ")
        ->setNumCode(226)
        ->setPhoneCode(240);


        $eritrea = new Country();
        $eritrea->setIso("ER")
        ->setName("ERITREA")
        ->setNiceName("Eritrea")
        ->setIso3("ERI")
        ->setNumCode(232)
        ->setPhoneCode(291);


        $estonia = new Country();
        $estonia->setIso("EE")
        ->setName("ESTONIA")
        ->setNiceName("Estonia")
        ->setIso3("EST")
        ->setNumCode(233)
        ->setPhoneCode(372);


        $ethiopia = new Country();
        $ethiopia->setIso("ET")
        ->setName("ETHIOPIA")
        ->setNiceName("Ethiopia")
        ->setIso3("ETH")
        ->setNumCode(231)
        ->setPhoneCode(251);


        $falkland_islands = new Country();
        $falkland_islands->setIso("FK")
        ->setName("FALKLAND ISLANDS (MALVINAS)")
        ->setNiceName("Falkland Islands (Malvinas)")
        ->setIso3("FLK")
        ->setNumCode(238)
        ->setPhoneCode(500);


        $faroe_islands = new Country();
        $faroe_islands->setIso("FO")
        ->setName("FAROE ISLANDS")
        ->setNiceName("Faroe Islands")
        ->setIso3("FRO")
        ->setNumCode(234)
        ->setPhoneCode(298);


        $fiji = new Country();
        $fiji->setIso("FJ")
        ->setName("FIJI")
        ->setNiceName("Fiji")
        ->setIso3("FJI")
        ->setNumCode(242)
        ->setPhoneCode(679);


        $finland = new Country();
        $finland->setIso("FI")
        ->setName("FINLAND")
        ->setNiceName("Finland")
        ->setIso3("FIN")
        ->setNumCode(246)
        ->setPhoneCode(358);


        $france = new Country();
        $france->setIso("FR")
        ->setName("FRANCE")
        ->setNiceName("France")
        ->setIso3("FRA")
        ->setNumCode(250)
        ->setPhoneCode(33);


        $french_guiana = new Country();
        $french_guiana->setIso("GF")
        ->setName("FRENCH GUIANA")
        ->setNiceName("French Guiana")
        ->setIso3("GUF")
        ->setNumCode(254)
        ->setPhoneCode(594);


        $french_polynesia = new Country();
        $french_polynesia->setIso("PF")
        ->setName("FRENCH POLYNESIA")
        ->setNiceName("French Polynesia")
        ->setIso3("PYF")
        ->setNumCode(258)
        ->setPhoneCode(689);


        $french_southern_territories = new Country();
        $french_southern_territories->setIso("TF")
        ->setName("FRENCH SOUTHERN TERRITORIES")
        ->setNiceName("French Southern Territories")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(0);


        $gabon = new Country();
        $gabon->setIso("GA")
        ->setName("GABON")
        ->setNiceName("Gabon")
        ->setIso3("GAB")
        ->setNumCode(266)
        ->setPhoneCode(241);


        $gambia = new Country();
        $gambia->setIso("GM")
        ->setName("GAMBIA")
        ->setNiceName("Gambia")
        ->setIso3("GMB")
        ->setNumCode(270)
        ->setPhoneCode(220);


        $georgia = new Country();
        $georgia->setIso("GE")
        ->setName("GEORGIA")
        ->setNiceName("Georgia")
        ->setIso3("GEO")
        ->setNumCode(268)
        ->setPhoneCode(995);


        $germany = new Country();
        $germany->setIso("DE")
        ->setName("GERMANY")
        ->setNiceName("Germany")
        ->setIso3("DEU")
        ->setNumCode(276)
        ->setPhoneCode(49);


        $ghana = new Country();
        $ghana->setIso("GH")
        ->setName("GHANA")
        ->setNiceName("Ghana")
        ->setIso3("GHA")
        ->setNumCode(288)
        ->setPhoneCode(233);


        $gibraltar = new Country();
        $gibraltar->setIso("GI")
        ->setName("GIBRALTAR")
        ->setNiceName("Gibraltar")
        ->setIso3("GIB")
        ->setNumCode(292)
        ->setPhoneCode(350);


        $greece = new Country();
        $greece->setIso("GR")
        ->setName("GREECE")
        ->setNiceName("Greece")
        ->setIso3("GRC")
        ->setNumCode(300)
        ->setPhoneCode(30);


        $greenland = new Country();
        $greenland->setIso("GL")
        ->setName("GREENLAND")
        ->setNiceName("Greenland")
        ->setIso3("GRL")
        ->setNumCode(304)
        ->setPhoneCode(299);


        $grenada = new Country();
        $grenada->setIso("GD")
        ->setName("GRENADA")
        ->setNiceName("Grenada")
        ->setIso3("GRD")
        ->setNumCode(308)
        ->setPhoneCode(1473);


        $guadeloupe = new Country();
        $guadeloupe->setIso("GP")
        ->setName("GUADELOUPE")
        ->setNiceName("Guadeloupe")
        ->setIso3("GLP")
        ->setNumCode(312)
        ->setPhoneCode(590);


        $guam = new Country();
        $guam->setIso("GU")
        ->setName("GUAM")
        ->setNiceName("Guam")
        ->setIso3("GUM")
        ->setNumCode(316)
        ->setPhoneCode(1671);


        $guatemala = new Country();
        $guatemala->setIso("GT")
        ->setName("GUATEMALA")
        ->setNiceName("Guatemala")
        ->setIso3("GTM")
        ->setNumCode(320)
        ->setPhoneCode(502);


        $guinea = new Country();
        $guinea->setIso("GN")
        ->setName("GUINEA")
        ->setNiceName("Guinea")
        ->setIso3("GIN")
        ->setNumCode(324)
        ->setPhoneCode(224);


        $guinea_bissau = new Country();
        $guinea_bissau->setIso("GW")
        ->setName("GUINEA-BISSAU")
        ->setNiceName("Guinea-Bissau")
        ->setIso3("GNB")
        ->setNumCode(624)
        ->setPhoneCode(245);


        $guyana = new Country();
        $guyana->setIso("GY")
        ->setName("GUYANA")
        ->setNiceName("Guyana")
        ->setIso3("GUY")
        ->setNumCode(328)
        ->setPhoneCode(592);


        $haiti = new Country();
        $haiti->setIso("HT")
        ->setName("HAITI")
        ->setNiceName("Haiti")
        ->setIso3("HTI")
        ->setNumCode(332)
        ->setPhoneCode(509);


        $heard_island_and_mcdonald_islands = new Country();
        $heard_island_and_mcdonald_islands->setIso("HM")
        ->setName("HEARD ISLAND AND MCDONALD ISLANDS")
        ->setNiceName("Heard Island and Mcdonald Islands")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(0);


        $holy_see = new Country();
        $holy_see->setIso("VA")
        ->setName("HOLY SEE (VATICAN CITY STATE)")
        ->setNiceName("Holy See (Vatican City State)")
        ->setIso3("VAT")
        ->setNumCode(336)
        ->setPhoneCode(39);


        $honduras = new Country();
        $honduras->setIso("HN")
        ->setName("HONDURAS")
        ->setNiceName("Honduras")
        ->setIso3("HND")
        ->setNumCode(340)
        ->setPhoneCode(504);


        $hong_kong = new Country();
        $hong_kong->setIso("HK")
        ->setName("HONG KONG")
        ->setNiceName("Hong Kong")
        ->setIso3("HKG")
        ->setNumCode(344)
        ->setPhoneCode(852);


        $hungary = new Country();
        $hungary->setIso("HU")
        ->setName("HUNGARY")
        ->setNiceName("Hungary")
        ->setIso3("HUN")
        ->setNumCode(348)
        ->setPhoneCode(36);


        $iceland = new Country();
        $iceland->setIso("IS")
        ->setName("ICELAND")
        ->setNiceName("Iceland")
        ->setIso3("ISL")
        ->setNumCode(352)
        ->setPhoneCode(354);


        $india = new Country();
        $india->setIso("IN")
        ->setName("INDIA")
        ->setNiceName("India")
        ->setIso3("IND")
        ->setNumCode(356)
        ->setPhoneCode(91);


        $indonesia = new Country();
        $indonesia->setIso("ID")
        ->setName("INDONESIA")
        ->setNiceName("Indonesia")
        ->setIso3("IDN")
        ->setNumCode(360)
        ->setPhoneCode(62);


        $iran = new Country();
        $iran->setIso("IR")
        ->setName("IRAN, ISLAMIC REPUBLIC OF")
        ->setNiceName("Iran, Islamic Republic of")
        ->setIso3("IRN")
        ->setNumCode(364)
        ->setPhoneCode(98);


        $iraq = new Country();
        $iraq->setIso("IQ")
        ->setName("IRAQ")
        ->setNiceName("Iraq")
        ->setIso3("IRQ")
        ->setNumCode(368)
        ->setPhoneCode(964);


        $ireland = new Country();
        $ireland->setIso("IE")
        ->setName("IRELAND")
        ->setNiceName("Ireland")
        ->setIso3("IRL")
        ->setNumCode(372)
        ->setPhoneCode(353);


        $israel = new Country();
        $israel->setIso("IL")
        ->setName("ISRAEL")
        ->setNiceName("Israel")
        ->setIso3("ISR")
        ->setNumCode(376)
        ->setPhoneCode(972);


        $italy = new Country();
        $italy->setIso("IT")
        ->setName("ITALY")
        ->setNiceName("Italy")
        ->setIso3("ITA")
        ->setNumCode(380)
        ->setPhoneCode(39);


        $jamaica = new Country();
        $jamaica->setIso("JM")
        ->setName("JAMAICA")
        ->setNiceName("Jamaica")
        ->setIso3("JAM")
        ->setNumCode(388)
        ->setPhoneCode(1876);


        $japan = new Country();
        $japan->setIso("JP")
        ->setName("JAPAN")
        ->setNiceName("Japan")
        ->setIso3("JPN")
        ->setNumCode(392)
        ->setPhoneCode(81);


        $jordan = new Country();
        $jordan->setIso("JO")
        ->setName("JORDAN")
        ->setNiceName("Jordan")
        ->setIso3("JOR")
        ->setNumCode(400)
        ->setPhoneCode(962);


        $kazakhstan = new Country();
        $kazakhstan->setIso("KZ")
        ->setName("KAZAKHSTAN")
        ->setNiceName("Kazakhstan")
        ->setIso3("KAZ")
        ->setNumCode(398)
        ->setPhoneCode(7);


        $kenya = new Country();
        $kenya->setIso("KE")
        ->setName("KENYA")
        ->setNiceName("Kenya")
        ->setIso3("KEN")
        ->setNumCode(404)
        ->setPhoneCode(254);


        $kiribati = new Country();
        $kiribati->setIso("KI")
        ->setName("KIRIBATI")
        ->setNiceName("Kiribati")
        ->setIso3("KIR")
        ->setNumCode(296)
        ->setPhoneCode(686);


        $korea_democratic= new Country();
        $korea_democratic->setIso("KP")
        ->setName("KOREA, DEMOCRATIC PEOPLES REPUBLIC OF")
        ->setNiceName("Korea, Democratic Peoples Republic of")
        ->setIso3("PRK")
        ->setNumCode(408)
        ->setPhoneCode(850);


        $korea_republic = new Country();
        $korea_republic->setIso("KR")
        ->setName("KOREA, REPUBLIC OF")
        ->setNiceName("Korea, Republic of")
        ->setIso3("KOR")
        ->setNumCode(410)
        ->setPhoneCode(82);


        $kuwait = new Country();
        $kuwait->setIso("KW")
        ->setName("KUWAIT")
        ->setNiceName("Kuwait")
        ->setIso3("KWT")
        ->setNumCode(414)
        ->setPhoneCode(965);


        $kyrgyzstan = new Country();
        $kyrgyzstan->setIso("KG")
        ->setName("KYRGYZSTAN")
        ->setNiceName("Kyrgyzstan")
        ->setIso3("KGZ")
        ->setNumCode(417)
        ->setPhoneCode(996);


        $lao = new Country();
        $lao->setIso("LA")
        ->setName("LAO PEOPLES DEMOCRATIC REPUBLIC")
        ->setNiceName("Lao Peoples Democratic Republic")
        ->setIso3("LAO")
        ->setNumCode(418)
        ->setPhoneCode(856);


        $latvia = new Country();
        $latvia->setIso("LV")
        ->setName("LATVIA")
        ->setNiceName("Latvia")
        ->setIso3("LVA")
        ->setNumCode(428)
        ->setPhoneCode(371);


        $lebanon = new Country();
        $lebanon->setIso("LB")
        ->setName("LEBANON")
        ->setNiceName("Lebanon")
        ->setIso3("LBN")
        ->setNumCode(422)
        ->setPhoneCode(961);


        $lesotho = new Country();
        $lesotho->setIso("LS")
        ->setName("LESOTHO")
        ->setNiceName("Lesotho")
        ->setIso3("LSO")
        ->setNumCode(426)
        ->setPhoneCode(266);


        $liberia = new Country();
        $liberia->setIso("LR")
        ->setName("LIBERIA")
        ->setNiceName("Liberia")
        ->setIso3("LBR")
        ->setNumCode(430)
        ->setPhoneCode(231);


        $libyan= new Country();
        $libyan->setIso("LY")
        ->setName("LIBYAN ARAB JAMAHIRIYA")
        ->setNiceName("Libyan Arab Jamahiriya")
        ->setIso3("LBY")
        ->setNumCode(434)
        ->setPhoneCode(218);


        $liechtenstein = new Country();
        $liechtenstein->setIso("LI")
        ->setName("LIECHTENSTEIN")
        ->setNiceName("Liechtenstein")
        ->setIso3("LIE")
        ->setNumCode(438)
        ->setPhoneCode(423);


        $lithuania = new Country();
        $lithuania->setIso("LT")
        ->setName("LITHUANIA")
        ->setNiceName("Lithuania")
        ->setIso3("LTU")
        ->setNumCode(440)
        ->setPhoneCode(370);


        $luxembourg = new Country();
        $luxembourg->setIso("LU")
        ->setName("LUXEMBOURG")
        ->setNiceName("Luxembourg")
        ->setIso3("LUX")
        ->setNumCode(442)
        ->setPhoneCode(352);


        $macao = new Country();
        $macao->setIso("MO")
        ->setName("MACAO")
        ->setNiceName("Macao")
        ->setIso3("MAC")
        ->setNumCode(446)
        ->setPhoneCode(853);


        $macedonia= new Country();
        $macedonia->setIso("MK")
        ->setName("MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF")
        ->setNiceName("Macedonia, the Former Yugoslav Republic of")
        ->setIso3("MKD")
        ->setNumCode(807)
        ->setPhoneCode(389);


        $madagascar = new Country();
        $madagascar->setIso("MG")
        ->setName("MADAGASCAR")
        ->setNiceName("Madagascar")
        ->setIso3("MDG")
        ->setNumCode(450)
        ->setPhoneCode(261);


        $malawi = new Country();
        $malawi->setIso("MW")
        ->setName("MALAWI")
        ->setNiceName("Malawi")
        ->setIso3("MWI")
        ->setNumCode(454)
        ->setPhoneCode(265);


        $malaysia = new Country();
        $malaysia->setIso("MY")
        ->setName("MALAYSIA")
        ->setNiceName("Malaysia")
        ->setIso3("MYS")
        ->setNumCode(458)
        ->setPhoneCode(60);


        $maldives = new Country();
        $maldives->setIso("MV")
        ->setName("MALDIVES")
        ->setNiceName("Maldives")
        ->setIso3("MDV")
        ->setNumCode(462)
        ->setPhoneCode(960);


        $mali = new Country();
        $mali->setIso("ML")
        ->setName("MALI")
        ->setNiceName("Mali")
        ->setIso3("MLI")
        ->setNumCode(466)
        ->setPhoneCode(223);


        $malta = new Country();
        $malta->setIso("MT")
        ->setName("MALTA")
        ->setNiceName("Malta")
        ->setIso3("MLT")
        ->setNumCode(470)
        ->setPhoneCode(356);


        $marshall = new Country();
        $marshall->setIso("MH")
        ->setName("MARSHALL ISLANDS")
        ->setNiceName("Marshall Islands")
        ->setIso3("MHL")
        ->setNumCode(584)
        ->setPhoneCode(692);


        $martinique = new Country();
        $martinique->setIso("MQ")
        ->setName("MARTINIQUE")
        ->setNiceName("Martinique")
        ->setIso3("MTQ")
        ->setNumCode(474)
        ->setPhoneCode(596);


        $mauritania = new Country();
        $mauritania->setIso("MR")
        ->setName("MAURITANIA")
        ->setNiceName("Mauritania")
        ->setIso3("MRT")
        ->setNumCode(478)
        ->setPhoneCode(222);


        $mauritius = new Country();
        $mauritius->setIso("MU")
        ->setName("MAURITIUS")
        ->setNiceName("Mauritius")
        ->setIso3("MUS")
        ->setNumCode(480)
        ->setPhoneCode(230);


        $mayotte = new Country();
        $mayotte->setIso("YT")
        ->setName("MAYOTTE")
        ->setNiceName("Mayotte")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(269);


        $mexico = new Country();
        $mexico->setIso("MX")
        ->setName("MEXICO")
        ->setNiceName("Mexico")
        ->setIso3("MEX")
        ->setNumCode(484)
        ->setPhoneCode(52);


        $micronesia = new Country();
        $micronesia->setIso("FM")
        ->setName("MICRONESIA, FEDERATED STATES OF")
        ->setNiceName("Micronesia, Federated States of")
        ->setIso3("FSM")
        ->setNumCode(583)
        ->setPhoneCode(691);


        $moldova = new Country();
        $moldova->setIso("MD")
        ->setName("MOLDOVA, REPUBLIC OF")
        ->setNiceName("Moldova, Republic of")
        ->setIso3("MDA")
        ->setNumCode(498)
        ->setPhoneCode(373);


        $monaco = new Country();
        $monaco->setIso("MC")
        ->setName("MONACO")
        ->setNiceName("Monaco")
        ->setIso3("MCO")
        ->setNumCode(492)
        ->setPhoneCode(377);


        $mongolia = new Country();
        $mongolia->setIso("MN")
        ->setName("MONGOLIA")
        ->setNiceName("Mongolia")
        ->setIso3("MNG")
        ->setNumCode(496)
        ->setPhoneCode(976);


        $montserrat = new Country();
        $montserrat->setIso("MS")
        ->setName("MONTSERRAT")
        ->setNiceName("Montserrat")
        ->setIso3("MSR")
        ->setNumCode(500)
        ->setPhoneCode(1664);


        $morocco = new Country();
        $morocco->setIso("MA")
        ->setName("MOROCCO")
        ->setNiceName("Morocco")
        ->setIso3("MAR")
        ->setNumCode(504)
        ->setPhoneCode(212);


        $mozambique = new Country();
        $mozambique->setIso("MZ")
        ->setName("MOZAMBIQUE")
        ->setNiceName("Mozambique")
        ->setIso3("MOZ")
        ->setNumCode(508)
        ->setPhoneCode(258);


        $myanmar = new Country();
        $myanmar->setIso("MM")
        ->setName("MYANMAR")
        ->setNiceName("Myanmar")
        ->setIso3("MMR")
        ->setNumCode(104)
        ->setPhoneCode(95);


        $namibia = new Country();
        $namibia->setIso("NA")
        ->setName("NAMIBIA")
        ->setNiceName("Namibia")
        ->setIso3("NAM")
        ->setNumCode(516)
        ->setPhoneCode(264);


        $nauru = new Country();
        $nauru->setIso("NR")
        ->setName("NAURU")
        ->setNiceName("Nauru")
        ->setIso3("NRU")
        ->setNumCode(520)
        ->setPhoneCode(674);


        $nepal = new Country();
        $nepal->setIso("NP")
        ->setName("NEPAL")
        ->setNiceName("Nepal")
        ->setIso3("NPL")
        ->setNumCode(524)
        ->setPhoneCode(977);


        $netherlands = new Country();
        $netherlands->setIso("NL")
        ->setName("NETHERLANDS")
        ->setNiceName("Netherlands")
        ->setIso3("NLD")
        ->setNumCode(528)
        ->setPhoneCode(31);


        $netherlands_antilles = new Country();
        $netherlands_antilles->setIso("AN")
        ->setName("NETHERLANDS ANTILLES")
        ->setNiceName("Netherlands Antilles")
        ->setIso3("ANT")
        ->setNumCode(530)
        ->setPhoneCode(599);


        $new_caledonia = new Country();
        $new_caledonia->setIso("NC")
        ->setName("NEW CALEDONIA")
        ->setNiceName("New Caledonia")
        ->setIso3("NCL")
        ->setNumCode(540)
        ->setPhoneCode(687);


        $new_zealand = new Country();
        $new_zealand->setIso("NZ")
        ->setName("NEW ZEALAND")
        ->setNiceName("New Zealand")
        ->setIso3("NZL")
        ->setNumCode(554)
        ->setPhoneCode(64);


        $nicaragua = new Country();
        $nicaragua->setIso("NI")
        ->setName("NICARAGUA")
        ->setNiceName("Nicaragua")
        ->setIso3("NIC")
        ->setNumCode(558)
        ->setPhoneCode(505);


        $niger = new Country();
        $niger->setIso("NE")
        ->setName("NIGER")
        ->setNiceName("Niger")
        ->setIso3("NER")
        ->setNumCode(562)
        ->setPhoneCode(227);


        $nigeria = new Country();
        $nigeria->setIso("NG")
        ->setName("NIGERIA")
        ->setNiceName("Nigeria")
        ->setIso3("NGA")
        ->setNumCode(566)
        ->setPhoneCode(234);


        $niue = new Country();
        $niue->setIso("NU")
        ->setName("NIUE")
        ->setNiceName("Niue")
        ->setIso3("NIU")
        ->setNumCode(570)
        ->setPhoneCode(683);


        $norfolk = new Country();
        $norfolk->setIso("NF")
        ->setName("NORFOLK ISLAND")
        ->setNiceName("Norfolk Island")
        ->setIso3("NFK")
        ->setNumCode(574)
        ->setPhoneCode(672);


        $northern = new Country();
        $northern->setIso("MP")
        ->setName("NORTHERN MARIANA ISLANDS")
        ->setNiceName("Northern Mariana Islands")
        ->setIso3("MNP")
        ->setNumCode(580)
        ->setPhoneCode(1670);


        $norway = new Country();
        $norway->setIso("NO")
        ->setName("NORWAY")
        ->setNiceName("Norway")
        ->setIso3("NOR")
        ->setNumCode(578)
        ->setPhoneCode(47);


        $oman = new Country();
        $oman->setIso("OM")
        ->setName("OMAN")
        ->setNiceName("Oman")
        ->setIso3("OMN")
        ->setNumCode(512)
        ->setPhoneCode(968);


        $pakistan = new Country();
        $pakistan->setIso("PK")
        ->setName("PAKISTAN")
        ->setNiceName("Pakistan")
        ->setIso3("PAK")
        ->setNumCode(586)
        ->setPhoneCode(92);


        $palau = new Country();
        $palau->setIso("PW")
        ->setName("PALAU")
        ->setNiceName("Palau")
        ->setIso3("PLW")
        ->setNumCode(585)
        ->setPhoneCode(680);


        $palestinian = new Country();
        $palestinian->setIso("PS")
        ->setName("PALESTINIAN TERRITORY, OCCUPIED")
        ->setNiceName("Palestinian Territory, Occupied")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(970);


        $panama = new Country();
        $panama->setIso("PA")
        ->setName("PANAMA")
        ->setNiceName("Panama")
        ->setIso3("PAN")
        ->setNumCode(591)
        ->setPhoneCode(507);


        $papua= new Country();
        $papua->setIso("PG")
        ->setName("PAPUA NEW GUINEA")
        ->setNiceName("Papua New Guinea")
        ->setIso3("PNG")
        ->setNumCode(598)
        ->setPhoneCode(675);


        $paraguay = new Country();
        $paraguay->setIso("PY")
        ->setName("PARAGUAY")
        ->setNiceName("Paraguay")
        ->setIso3("PRY")
        ->setNumCode(600)
        ->setPhoneCode(595);


        $peru = new Country();
        $peru->setIso("PE")
        ->setName("PERU")
        ->setNiceName("Peru")
        ->setIso3("PER")
        ->setNumCode(604)
        ->setPhoneCode(51);


        $philippines = new Country();
        $philippines->setIso("PH")
        ->setName("PHILIPPINES")
        ->setNiceName("Philippines")
        ->setIso3("PHL")
        ->setNumCode(608)
        ->setPhoneCode(63);


        $pitcairn = new Country();
        $pitcairn->setIso("PN")
        ->setName("PITCAIRN")
        ->setNiceName("Pitcairn")
        ->setIso3("PCN")
        ->setNumCode(612)
        ->setPhoneCode(0);


        $poland = new Country();
        $poland->setIso("PL")
        ->setName("POLAND")
        ->setNiceName("Poland")
        ->setIso3("POL")
        ->setNumCode(616)
        ->setPhoneCode(48);


        $portugal = new Country();
        $portugal->setIso("PT")
        ->setName("PORTUGAL")
        ->setNiceName("Portugal")
        ->setIso3("PRT")
        ->setNumCode(620)
        ->setPhoneCode(351);


        $puerto = new Country();
        $puerto->setIso("PR")
        ->setName("PUERTO RICO")
        ->setNiceName("Puerto Rico")
        ->setIso3("PRI")
        ->setNumCode(630)
        ->setPhoneCode(1787);


        $qatar = new Country();
        $qatar->setIso("QA")
        ->setName("QATAR")
        ->setNiceName("Qatar")
        ->setIso3("QAT")
        ->setNumCode(634)
        ->setPhoneCode(974);


        $reunion = new Country();
        $reunion->setIso("RE")
        ->setName("REUNION")
        ->setNiceName("Reunion")
        ->setIso3("REU")
        ->setNumCode(638)
        ->setPhoneCode(262);


        $romania = new Country();
        $romania->setIso("RO")
        ->setName("ROMANIA")
        ->setNiceName("Romania")
        ->setIso3("ROM")
        ->setNumCode(642)
        ->setPhoneCode(40);


        $russian = new Country();
        $russian->setIso("RU")
        ->setName("RUSSIAN FEDERATION")
        ->setNiceName("Russian Federation")
        ->setIso3("RUS")
        ->setNumCode(643)
        ->setPhoneCode(70);


        $rwanda = new Country();
        $rwanda->setIso("RW")
        ->setName("RWANDA")
        ->setNiceName("Rwanda")
        ->setIso3("RWA")
        ->setNumCode(646)
        ->setPhoneCode(250);


        $saint_helena = new Country();
        $saint_helena->setIso("SH")
        ->setName("SAINT HELENA")
        ->setNiceName("Saint Helena")
        ->setIso3("SHN")
        ->setNumCode(654)
        ->setPhoneCode(290);

        $saint_kitts = new Country();
        $saint_kitts->setIso("KN")
        ->setName("SAINT KITTS AND NEVIS")
        ->setNiceName("Saint Kitts and Nevis")
        ->setIso3("KNA")
        ->setNumCode(659)
        ->setPhoneCode(1869);

        $saint_lucia = new Country();
        $saint_lucia->setIso("LC")
        ->setName("SAINT LUCIA")
        ->setNiceName("Saint Lucia")
        ->setIso3("LCA")
        ->setNumCode(662)
        ->setPhoneCode(1758);

        $saint_piere = new Country();
        $saint_piere->setIso("PM")
        ->setName("SAINT PIERRE AND MIQUELON")
        ->setNiceName("Saint Pierre and Miquelon")
        ->setIso3("SPM")
        ->setNumCode(666)
        ->setPhoneCode(508);

        $saint_vincent = new Country();
        $saint_vincent->setIso("VC")
        ->setName("SAINT VINCENT AND THE GRENADINES")
        ->setNiceName("Saint Vincent and the Grenadines")
        ->setIso3("VCT")
        ->setNumCode(670)
        ->setPhoneCode(1784);


        $samoa = new Country();
        $samoa->setIso("WS")
        ->setName("SAMOA")
        ->setNiceName("Samoa")
        ->setIso3("WSM")
        ->setNumCode(882)
        ->setPhoneCode(684);


        $san_marino = new Country();
        $san_marino->setIso("SM")
        ->setName("SAN MARINO")
        ->setNiceName("San Marino")
        ->setIso3("SMR")
        ->setNumCode(674)
        ->setPhoneCode(378);


        $sao_tome = new Country();
        $sao_tome->setIso("ST")
        ->setName("SAO TOME AND PRINCIPE")
        ->setNiceName("Sao Tome and Principe")
        ->setIso3("STP")
        ->setNumCode(678)
        ->setPhoneCode(239);


        $saudi = new Country();
        $saudi->setIso("SA")
        ->setName("SAUDI ARABIA")
        ->setNiceName("Saudi Arabia")
        ->setIso3("SAU")
        ->setNumCode(682)
        ->setPhoneCode(966);


        $senegal = new Country();
        $senegal->setIso("SN")
        ->setName("SENEGAL")
        ->setNiceName("Senegal")
        ->setIso3("SEN")
        ->setNumCode(686)
        ->setPhoneCode(221);


        $serbia = new Country();
        $serbia->setIso("CS")
        ->setName("SERBIA AND MONTENEGRO")
        ->setNiceName("Serbia and Montenegro")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(381);


        $seychelles = new Country();
        $seychelles->setIso("SC")
        ->setName("SEYCHELLES")
        ->setNiceName("Seychelles")
        ->setIso3("SYC")
        ->setNumCode(690)
        ->setPhoneCode(248);


        $sierra = new Country();
        $sierra->setIso("SL")
        ->setName("SIERRA LEONE")
        ->setNiceName("Sierra Leone")
        ->setIso3("SLE")
        ->setNumCode(694)
        ->setPhoneCode(232);


        $singapore = new Country();
        $singapore->setIso("SG")
        ->setName("SINGAPORE")
        ->setNiceName("Singapore")
        ->setIso3("SGP")
        ->setNumCode(702)
        ->setPhoneCode(65);


        $slovakia = new Country();
        $slovakia->setIso("SK")
        ->setName("SLOVAKIA")
        ->setNiceName("Slovakia")
        ->setIso3("SVK")
        ->setNumCode(703)
        ->setPhoneCode(421);


        $slovenia = new Country();
        $slovenia->setIso("SI")
        ->setName("SLOVENIA")
        ->setNiceName("Slovenia")
        ->setIso3("SVN")
        ->setNumCode(705)
        ->setPhoneCode(386);


        $solomon = new Country();
        $solomon->setIso("SB")
        ->setName("SOLOMON ISLANDS")
        ->setNiceName("Solomon Islands")
        ->setIso3("SLB")
        ->setNumCode(90)
        ->setPhoneCode(677);


        $somalia = new Country();
        $somalia->setIso("SO")
        ->setName("SOMALIA")
        ->setNiceName("Somalia")
        ->setIso3("SOM")
        ->setNumCode(706)
        ->setPhoneCode(252);


        $south_africa = new Country();
        $south_africa->setIso("ZA")
        ->setName("SOUTH AFRICA")
        ->setNiceName("South Africa")
        ->setIso3("ZAF")
        ->setNumCode(710)
        ->setPhoneCode(27);


        $south_georgia = new Country();
        $south_georgia->setIso("GS")
        ->setName("SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS")
        ->setNiceName("South Georgia and the South Sandwich Islands")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(0);


        $spain = new Country();
        $spain->setIso("ES")
        ->setName("SPAIN")
        ->setNiceName("Spain")
        ->setIso3("ESP")
        ->setNumCode(724)
        ->setPhoneCode(34);


        $sri_lanka = new Country();
        $sri_lanka->setIso("LK")
        ->setName("SRI LANKA")
        ->setNiceName("Sri Lanka")
        ->setIso3("LKA")
        ->setNumCode(144)
        ->setPhoneCode(94);


        $sudan = new Country();
        $sudan->setIso("SD")
        ->setName("SUDAN")
        ->setNiceName("Sudan")
        ->setIso3("SDN")
        ->setNumCode(736)
        ->setPhoneCode(249);


        $suriname = new Country();
        $suriname->setIso("SR")
        ->setName("SURINAME")
        ->setNiceName("Suriname")
        ->setIso3("SUR")
        ->setNumCode(740)
        ->setPhoneCode(597);


        $svalbard = new Country();
        $svalbard->setIso("SJ")
        ->setName("SVALBARD AND JAN MAYEN")
        ->setNiceName("Svalbard and Jan Mayen")
        ->setIso3("SJM")
        ->setNumCode(744)
        ->setPhoneCode(47);


        $swaziland = new Country();
        $swaziland->setIso("SZ")
        ->setName("SWAZILAND")
        ->setNiceName("Swaziland")
        ->setIso3("SWZ")
        ->setNumCode(748)
        ->setPhoneCode(268);


        $sweden = new Country();
        $sweden->setIso("SE")
        ->setName("SWEDEN")
        ->setNiceName("Sweden")
        ->setIso3("SWE")
        ->setNumCode(752)
        ->setPhoneCode(46);


        $switzerland = new Country();
        $switzerland->setIso("CH")
        ->setName("SWITZERLAND")
        ->setNiceName("Switzerland")
        ->setIso3("CHE")
        ->setNumCode(756)
        ->setPhoneCode(41);


        $syrian = new Country();
        $syrian->setIso("SY")
        ->setName("SYRIAN ARAB REPUBLIC")
        ->setNiceName("Syrian Arab Republic")
        ->setIso3("SYR")
        ->setNumCode(760)
        ->setPhoneCode(963);


        $taiwan = new Country();
        $taiwan->setIso("TW")
        ->setName("TAIWAN, PROVINCE OF CHINA")
        ->setNiceName("Taiwan, Province of China")
        ->setIso3("TWN")
        ->setNumCode(158)
        ->setPhoneCode(886);


        $tajikistan = new Country();
        $tajikistan->setIso("TJ")
        ->setName("TAJIKISTAN")
        ->setNiceName("Tajikistan")
        ->setIso3("TJK")
        ->setNumCode(762)
        ->setPhoneCode(992);


        $tanzania = new Country();
        $tanzania->setIso("TZ")
        ->setName("TANZANIA, UNITED REPUBLIC OF")
        ->setNiceName("Tanzania, United Republic of")
        ->setIso3("TZA")
        ->setNumCode(834)
        ->setPhoneCode(255);


        $thailand = new Country();
        $thailand->setIso("TH")
        ->setName("THAILAND")
        ->setNiceName("Thailand")
        ->setIso3("THA")
        ->setNumCode(764)
        ->setPhoneCode(66);


        $timor_leste = new Country();
        $timor_leste->setIso("TL")
        ->setName("TIMOR-LESTE")
        ->setNiceName("Timor-Leste")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(670);


        $togo = new Country();
        $togo->setIso("TG")
        ->setName("TOGO")
        ->setNiceName("Togo")
        ->setIso3("TGO")
        ->setNumCode(768)
        ->setPhoneCode(228);


        $tokelau = new Country();
        $tokelau->setIso("TK")
        ->setName("TOKELAU")
        ->setNiceName("Tokelau")
        ->setIso3("TKL")
        ->setNumCode(772)
        ->setPhoneCode(690);


        $tonga = new Country();
        $tonga->setIso("TO")
        ->setName("TONGA")
        ->setNiceName("Tonga")
        ->setIso3("TON")
        ->setNumCode(776)
        ->setPhoneCode(676);


        $trinidad = new Country();
        $trinidad->setIso("TT")
        ->setName("TRINIDAD AND TOBAGO")
        ->setNiceName("Trinidad and Tobago")
        ->setIso3("TTO")
        ->setNumCode(780)
        ->setPhoneCode(1868);


        $tunisia = new Country();
        $tunisia->setIso("TN")
        ->setName("TUNISIA")
        ->setNiceName("Tunisia")
        ->setIso3("TUN")
        ->setNumCode(788)
        ->setPhoneCode(216);


        $turkey = new Country();
        $turkey->setIso("TR")
        ->setName("TURKEY")
        ->setNiceName("Turkey")
        ->setIso3("TUR")
        ->setNumCode(792)
        ->setPhoneCode(90);


        $turkmenistan = new Country();
        $turkmenistan->setIso("TM")
        ->setName("TURKMENISTAN")
        ->setNiceName("Turkmenistan")
        ->setIso3("TKM")
        ->setNumCode(795)
        ->setPhoneCode(7370);


        $turks = new Country();
        $turks->setIso("TC")
        ->setName("TURKS AND CAICOS ISLANDS")
        ->setNiceName("Turks and Caicos Islands")
        ->setIso3("TCA")
        ->setNumCode(796)
        ->setPhoneCode(1649);


        $tuvalu = new Country();
        $tuvalu->setIso("TV")
        ->setName("TUVALU")
        ->setNiceName("Tuvalu")
        ->setIso3("TUV")
        ->setNumCode(798)
        ->setPhoneCode(688);


        $uganda = new Country();
        $uganda->setIso("UG")
        ->setName("UGANDA")
        ->setNiceName("Uganda")
        ->setIso3("UGA")
        ->setNumCode(800)
        ->setPhoneCode(256);


        $ukraine = new Country();
        $ukraine->setIso("UA")
        ->setName("UKRAINE")
        ->setNiceName("Ukraine")
        ->setIso3("UKR")
        ->setNumCode(804)
        ->setPhoneCode(380);


        $uae = new Country();
        $uae->setIso("AE")
        ->setName("UNITED ARAB EMIRATES")
        ->setNiceName("United Arab Emirates")
        ->setIso3("ARE")
        ->setNumCode(784)
        ->setPhoneCode(971);


        $uk = new Country();
        $uk->setIso("GB")
        ->setName("UNITED KINGDOM")
        ->setNiceName("United Kingdom")
        ->setIso3("GBR")
        ->setNumCode(826)
        ->setPhoneCode(44);


        $us = new Country();
        $us->setIso("US")
        ->setName("UNITED STATES")
        ->setNiceName("United States")
        ->setIso3("USA")
        ->setNumCode(840)
        ->setPhoneCode(1);


        $us_minor = new Country();
        $us_minor->setIso("UM")
        ->setName("UNITED STATES MINOR OUTLYING ISLANDS")
        ->setNiceName("United States Minor Outlying Islands")
        ->setIso3("0")
        ->setNumCode(0)
        ->setPhoneCode(1);


        $uruguay = new Country();
        $uruguay->setIso("UY")
        ->setName("URUGUAY")
        ->setNiceName("Uruguay")
        ->setIso3("URY")
        ->setNumCode(858)
        ->setPhoneCode(598);


        $uzbekistan = new Country();
        $uzbekistan->setIso("UZ")
        ->setName("UZBEKISTAN")
        ->setNiceName("Uzbekistan")
        ->setIso3("UZB")
        ->setNumCode(860)
        ->setPhoneCode(998);


        $vanuatu = new Country();
        $vanuatu->setIso("VU")
        ->setName("VANUATU")
        ->setNiceName("Vanuatu")
        ->setIso3("VUT")
        ->setNumCode(548)
        ->setPhoneCode(678);


        $venezuela = new Country();
        $venezuela->setIso("VE")
        ->setName("VENEZUELA")
        ->setNiceName("Venezuela")
        ->setIso3("VEN")
        ->setNumCode(862)
        ->setPhoneCode(58);


        $viet_nam = new Country();
        $viet_nam->setIso("VN")
        ->setName("VIET NAM")
        ->setNiceName("Viet Nam")
        ->setIso3("VNM")
        ->setNumCode(704)
        ->setPhoneCode(84);


        $virgin_islands_british = new Country();
        $virgin_islands_british->setIso("VG")
        ->setName("VIRGIN ISLANDS, BRITISH")
        ->setNiceName("Virgin Islands, British")
        ->setIso3("VGB")
        ->setNumCode(92)
        ->setPhoneCode(1284);


        $virgin_islands_us = new Country();
        $virgin_islands_us->setIso("VI")
        ->setName("VIRGIN ISLANDS, U.S.")
        ->setNiceName("Virgin Islands, U.s.")
        ->setIso3("VIR")
        ->setNumCode(850)
        ->setPhoneCode(1340);


        $wallis_futuna = new Country();
        $wallis_futuna->setIso("WF")
        ->setName("WALLIS AND FUTUNA")
        ->setNiceName("Wallis and Futuna")
        ->setIso3("WLF")
        ->setNumCode(876)
        ->setPhoneCode(681);


        $western_sahara = new Country();
        $western_sahara->setIso("EH")
        ->setName("WESTERN SAHARA")
        ->setNiceName("Western Sahara")
        ->setIso3("ESH")
        ->setNumCode(732)
        ->setPhoneCode(212);

        $yemen = new Country();
        $yemen->setIso("YE")
        ->setName("YEMEN")
        ->setNiceName("Yemen")
        ->setIso3("YEM")
        ->setNumCode(887)
        ->setPhoneCode(967);

        $zambia = new Country();
        $zambia->setIso("ZM")
        ->setName("ZAMBIA")
        ->setNiceName("Zambia")
        ->setIso3("ZMB")
        ->setNumCode(894)
        ->setPhoneCode(260);

        $zimbabwe = new Country();
        $zimbabwe->setIso("ZW")
        ->setName("ZIMBABWE")
        ->setNiceName("Zimbabwe")
        ->setIso3("ZWE")
        ->setNumCode(716)
        ->setPhoneCode(263);

        $manager->persist($afghanistan);
        $manager->persist($albania);
        $manager->persist($algeria);
        $manager->persist($american_samoa);
        $manager->persist($andorra);
        $manager->persist($angola);
        $manager->persist($anguilla);
        $manager->persist($antarctica);
        $manager->persist($antigua_and_barbuda);
        $manager->persist($argentina);
        $manager->persist($armenia);
        $manager->persist($aruba);
        $manager->persist($australia);
        $manager->persist($austria);
        $manager->persist($azerbaijan);
        $manager->persist($bahamas);
        $manager->persist($bahrain);
        $manager->persist($bangladesh);
        $manager->persist($barbados);
        $manager->persist($belarus);
        $manager->persist($belgium);
        $manager->persist($belize);
        $manager->persist($benin);
        $manager->persist($bermuda);
        $manager->persist($bhutan);
        $manager->persist($bolivia);
        $manager->persist($bosnia_and_herzegovina);
        $manager->persist($botswana);
        $manager->persist($bouvet_island);
        $manager->persist($brazil);
        $manager->persist($british_indian_ocean_territory);
        $manager->persist($brunei_darussalam);
        $manager->persist($bulgaria);
        $manager->persist($burkina_faso);
        $manager->persist($burundi);
        $manager->persist($cambodia);
        $manager->persist($cameroon);
        $manager->persist($canada);
        $manager->persist($cape_verde);
        $manager->persist($cayman_islands);
        $manager->persist($central_african_republic);
        $manager->persist($chad);
        $manager->persist($chile);
        $manager->persist($china);
        $manager->persist($christmas_island);
        $manager->persist($cocos_islands);
        $manager->persist($colombia);
        $manager->persist($comoros);
        $manager->persist($congo);
        $manager->persist($congo_democratic_republic);
        $manager->persist($cook_islands);
        $manager->persist($costa_rica);
        $manager->persist($cote_divoire);
        $manager->persist($croatia);
        $manager->persist($cuba);
        $manager->persist($cyprus);
        $manager->persist($czech_republic);
        $manager->persist($denmark);
        $manager->persist($djibouti);
        $manager->persist($dominica);
        $manager->persist($dominican_republic);
        $manager->persist($ecuador);
        $manager->persist($egypt);
        $manager->persist($el_salvador);
        $manager->persist($equatorial_guinea);
        $manager->persist($eritrea);
        $manager->persist($estonia);
        $manager->persist($ethiopia);
        $manager->persist($falkland_islands);
        $manager->persist($faroe_islands);
        $manager->persist($fiji);
        $manager->persist($finland);
        $manager->persist($france);
        $manager->persist($french_guiana);
        $manager->persist($french_polynesia);
        $manager->persist($french_southern_territories);
        $manager->persist($gabon);
        $manager->persist($gambia);
        $manager->persist($georgia);
        $manager->persist($germany);
        $manager->persist($ghana);
        $manager->persist($gibraltar);
        $manager->persist($greece);
        $manager->persist($greenland);
        $manager->persist($grenada);
        $manager->persist($guadeloupe);
        $manager->persist($guam);
        $manager->persist($guatemala);
        $manager->persist($guinea);
        $manager->persist($guinea_bissau);
        $manager->persist($guyana);
        $manager->persist($haiti);
        $manager->persist($heard_island_and_mcdonald_islands);
        $manager->persist($holy_see);
        $manager->persist($honduras);
        $manager->persist($hong_kong);
        $manager->persist($hungary);
        $manager->persist($iceland);
        $manager->persist($india);
        $manager->persist($indonesia);
        $manager->persist($iran);
        $manager->persist($iraq);
        $manager->persist($ireland);
        $manager->persist($israel);
        $manager->persist($italy);
        $manager->persist($jamaica);
        $manager->persist($japan);
        $manager->persist($jordan);
        $manager->persist($kazakhstan);
        $manager->persist($kenya);
        $manager->persist($kiribati);
        $manager->persist($korea_democratic);
        $manager->persist($korea_republic);
        $manager->persist($kuwait);
        $manager->persist($kyrgyzstan);
        $manager->persist($lao);
        $manager->persist($latvia);
        $manager->persist($lebanon);
        $manager->persist($lesotho);
        $manager->persist($liberia);
        $manager->persist($libyan);
        $manager->persist($liechtenstein);
        $manager->persist($lithuania);
        $manager->persist($luxembourg);
        $manager->persist($macao);
        $manager->persist($macedonia);
        $manager->persist($madagascar);
        $manager->persist($malawi);
        $manager->persist($malaysia);
        $manager->persist($maldives);
        $manager->persist($mali);
        $manager->persist($malta);
        $manager->persist($marshall);
        $manager->persist($martinique);
        $manager->persist($mauritania);
        $manager->persist($mauritius);
        $manager->persist($mayotte);
        $manager->persist($mexico);
        $manager->persist($micronesia);
        $manager->persist($moldova);
        $manager->persist($monaco);
        $manager->persist($mongolia);
        $manager->persist($montserrat);
        $manager->persist($morocco);
        $manager->persist($mozambique);
        $manager->persist($myanmar);
        $manager->persist($namibia);
        $manager->persist($nauru);
        $manager->persist($nepal);
        $manager->persist($netherlands);
        $manager->persist($netherlands);
        $manager->persist($new_caledonia);
        $manager->persist($new_zealand);
        $manager->persist($nicaragua);
        $manager->persist($niger);
        $manager->persist($nigeria);
        $manager->persist($niue);
        $manager->persist($norfolk);
        $manager->persist($northern);
        $manager->persist($norway);
        $manager->persist($oman);
        $manager->persist($pakistan);
        $manager->persist($palau);
        $manager->persist($palestinian);
        $manager->persist($panama);
        $manager->persist($papua);
        $manager->persist($paraguay);
        $manager->persist($peru);
        $manager->persist($philippines);
        $manager->persist($pitcairn);
        $manager->persist($poland);
        $manager->persist($portugal);
        $manager->persist($puerto);
        $manager->persist($qatar);
        $manager->persist($reunion);
        $manager->persist($romania);
        $manager->persist($russian);
        $manager->persist($rwanda);
        $manager->persist($saint_helena);
        $manager->persist($saint_kitts);
        $manager->persist($saint_lucia);
        $manager->persist($saint_piere);
        $manager->persist($saint_vincent);
        $manager->persist($samoa);
        $manager->persist($san_marino);
        $manager->persist($sao_tome);
        $manager->persist($saudi);
        $manager->persist($senegal);
        $manager->persist($serbia);
        $manager->persist($seychelles);
        $manager->persist($sierra);
        $manager->persist($singapore);
        $manager->persist($slovakia);
        $manager->persist($slovenia);
        $manager->persist($solomon);
        $manager->persist($somalia);
        $manager->persist($south_africa);
        $manager->persist($south_georgia);
        $manager->persist($spain);
        $manager->persist($sri_lanka);
        $manager->persist($sudan);
        $manager->persist($suriname);
        $manager->persist($svalbard);
        $manager->persist($swaziland);
        $manager->persist($sweden);
        $manager->persist($switzerland);
        $manager->persist($syrian);
        $manager->persist($taiwan);
        $manager->persist($tajikistan);
        $manager->persist($tanzania);
        $manager->persist($thailand);
        $manager->persist($timor_leste);
        $manager->persist($togo);
        $manager->persist($tokelau);
        $manager->persist($tonga);
        $manager->persist($trinidad);
        $manager->persist($tunisia);
        $manager->persist($turkey);
        $manager->persist($turkmenistan);
        $manager->persist($turks);
        $manager->persist($tuvalu);
        $manager->persist($uganda);
        $manager->persist($ukraine);
        $manager->persist($uae);
        $manager->persist($uk);
        $manager->persist($us);
        $manager->persist($us_minor);
        $manager->persist($uruguay);
        $manager->persist($uzbekistan);
        $manager->persist($vanuatu);
        $manager->persist($venezuela);
        $manager->persist($viet_nam);
        $manager->persist($virgin_islands_british);
        $manager->persist($virgin_islands_us);
        $manager->persist($wallis_futuna);
        $manager->persist($western_sahara);
        $manager->persist($yemen);
        $manager->persist($zambia);
        $manager->persist($zimbabwe);
        $manager->flush();

        $this->addReference(self::ALBANIA_REF, $albania);
        $this->addReference(self::ALGERIA_REF, $algeria);
        $this->addReference(self::TUNISIA_REF, $tunisia);
    }
}