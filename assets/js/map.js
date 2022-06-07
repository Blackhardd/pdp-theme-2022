function initMap(){
    jQuery(document).ready(function($){
        if($('.map').length){
            const map_style = [
                {
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "weight": "2.00"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#9c9c9c"
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#7b7b7b"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#46bcec"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#c8d7d4"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#070707"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                }
            ]

            const cityBounds = {}

            mapData.cities.forEach(city => {
                cityBounds[city] = getBounds(city)
            })
        
            const map = new google.maps.Map(document.querySelector('.map__map'), {
                center: mapData.mainCity ? cityBounds[mapData.mainCity].getCenter() : cityBounds[Object.keys(cityBounds)[0]].getCenter(),
                zoom: 12,
                styles: map_style,
                zoomControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                rotateControl: false,
                fullscreenControl: false
            })
        
            const infoWindow = new google.maps.InfoWindow({
                pixelOffset: new google.maps.Size(135, 0),
            })
        
            mapData.salons.forEach((item, index) => createMarker(item))
    
            /**
             *  Helpers
             */
    
            function getBounds(city){
                const bounds = new google.maps.LatLngBounds()
                mapData.salons.filter(salon => salon.city === city).forEach(salon => bounds.extend(salon.location))
                return bounds
            }
        
            function createMarker(salon){
                const icon = {
                    anchor: new google.maps.Point(24, 37),
                    url: "data:image/svg+xml,%3Csvg width='24' height='37' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M24 12c0 2.19-.58 4.23-1.6 6-1.75 3-7.18 12.93-9.47 17.23-.39.73-1.47.73-1.86 0-2.3-4.3-7.72-14.22-9.46-17.23A12 12 0 1 1 24 12Z' fill='%23000'/%3E%3Cpath d='M15.6 8.2V6l-2.4 2.2h-2.4L6 12.6h2.4l2.4-2.2v2.2h2.4l-2.4 2.2V17l4.8-4.4v-2.2L18 8.2h-2.4Z' fill='%23AA957C'/%3E%3C/svg%3E"
                }
        
                const marker = new google.maps.Marker({ map, icon, position: salon.location })
        
                google.maps.event.addListener(marker, 'click', function(){
                    infoWindow.setContent(buildInfoWindowContent(salon));
                    infoWindow.open(map, this);
                })
            }
        
            function buildInfoWindowContent(salon){
                let html = `
                    <div class="map-info">
                        <div class="map-info__body">
                `
                html += salon.title ? `<div class="map-info__title">${salon.title}</div>` : ''

                html += `
                            <a href="${salon.link}" class="map-info__link" target="_blank">${salon.name}</a>
                        </div>
                        <div class="map-info__footer">
                            <a href="tel:${salon.phone}" class="btn btn--outline btn--square-icon">
                                <svg width="16" height="16" fill="none">
                                    <path d="m15.64 12.66-2.47-2.48c-.5-.5-1.3-.48-1.82.03l-1.24 1.25-.25-.14a12.39 12.39 0 0 1-3-2.17c-1.13-1.14-1.72-2.22-2.16-3l-.13-.24.83-.84.41-.41a1.3 1.3 0 0 0 .03-1.82L3.37.36c-.49-.5-1.3-.48-1.81.03l-.7.7.02.02a4.04 4.04 0 0 0-.83 2.05c-.33 2.7.91 5.19 4.26 8.55 4.64 4.65 8.38 4.3 8.54 4.28a4.16 4.16 0 0 0 2.04-.83h.01l.7-.68c.52-.51.53-1.33.04-1.82Z" />
                                </svg>
                            </a>
                            <a href="${mapData.contactsUrl}?salonId=${salon.id}" class="btn">${map_i18n.enroll}</a>
                        </div>
                    </div>
                `

                return html
            }
    
            const $citySelect = document.querySelector('.map__city .select-wrapper input')

            $citySelect.addEventListener('change', function(e){
                map.setCenter(cityBounds[e.target.value].getCenter())
            })
        }
    })
}