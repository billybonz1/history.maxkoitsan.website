<?

// ACF countries choices

function acf_countries_field_choices( $field ) {

// reset choices

$countriesJson = json_decode(file_get_contents(get_template_directory().'/data/europe.geojson'));
$field['choices'] = array();

foreach($countriesJson->features as $country){
if(!empty($country->properties->NAME_RU)) $field['choices'][ $country->properties->NAME ] =
$country->properties->NAME_RU;
}

// return the field
return $field;

}

add_filter('acf/load_field/name=country', 'acf_countries_field_choices');


if(isset($_GET['city_json'])){
class BlockHelper {

var $block_id;
var $post_id;

function __construct( string $block_id, int $post_id ) {
$this->block_id = $block_id;
$this->post_id = $post_id;

}
public function getBlockFields() {
$post = get_post( $this->post_id );

if (! $post ) { return false; }

$blocks = parse_blocks( $post->post_content );

if ($blocks) {
$iterator = new RecursiveArrayIterator( $blocks );
$recursive = new RecursiveIteratorIterator(
$iterator,
RecursiveIteratorIterator::SELF_FIRST
);
foreach ( $recursive as $key => $value ) {
if ( isset($value['attrs']) && isset($value['attrs']['id']) ){
if ( $value['attrs']['id'] === $this->block_id ) {
acf_setup_meta( $value['attrs']['data'], $value['attrs']['id'], true );
acf_reset_meta( $value['attrs']['id'] );
return $value['attrs']['data'];
}
}
}
}
return false;

}

}

$blockHelper = new BlockHelper("block_620d68672c44a", 5);
$json = array();
$json['type'] = "FeatureCollection";
$json['name'] = "cities";
$json['crs'] = array();
$json['crs']['type'] = "name";
$json['crs']['properties'] = array();
$json['crs']['properties']["name"] = "urn:ogc:def:crs:OGC:1.3:CRS84";
$json['features'] = array();
$blockFields = $blockHelper->getBlockFields();
for($i=0;$i<(int)$blockFields['countries'];$i++){ for($j=0;$j<(int)$blockFields['countries_'.$i.'_cities'];$j++){
    $feature=array(); $feature["type"]="Feature" ; $city=array(); $city["fid"]=$j+1;
    $city["NAME"]=$blockFields['countries_'.$i.'_cities_'.$j.'_name'];
    $city["NAME_RU"]=$blockFields['countries_'.$i.'_cities_'.$j.'_name_ru'];
    $city["COUNTRY"]=$blockFields['countries_'.$i.'_country'];
    $city["WIKI"]=$blockFields['countries_'.$i.'_cities_'.$j.'_wiki']; $feature["properties"]=$city;
    $feature["geometry"]=array( "type"=> "Point",
    "coordinates" => [$blockFields['countries_'.$i.'_cities_'.$j.'_latitude'],
    $blockFields['countries_'.$i.'_cities_'.$j.'_longitude']]
    );
    $json['features'][] = $feature;
    }
    }
    echo json_encode($json);
    exit();
    }