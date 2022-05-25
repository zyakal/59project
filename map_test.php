<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/styles.css">
	<title>59 - Map</title>
	<style>
		.wrap {position: absolute;left: 0;bottom: 40px;width: 288px;height: 132px;margin-left: -144px;text-align: left;overflow: hidden;font-size: 12px;font-family: 'Malgun Gothic', dotum, '돋움', sans-serif;line-height: 1.5;}
		.wrap * {padding: 0;margin: 0;}
		.wrap .info {width: 286px;height: 120px;border-radius: 5px;border-bottom: 2px solid #ccc;border-right: 1px solid #ccc;overflow: hidden;background: #fff;}
		.wrap .info:nth-child(1) {border: 0;box-shadow: 0px 1px 2px #888;}
		.info .title {padding: 5px 0 0 10px;height: 30px;background: #eee;border-bottom: 1px solid #ddd;font-size: 18px;font-weight: bold;}
		.info .close {position: absolute;top: 10px;right: 10px;color: #888;width: 17px;height: 17px;background: url('https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/overlay_close.png');}
		.info .close:hover {cursor: pointer;}
		.info .body {position: relative;overflow: hidden;}
		.info .desc {position: relative;margin: 13px 0 0 90px;height: 75px;}
		.desc .ellipsis {overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
		.desc .jibun {font-size: 11px;color: #888;margin-top: -2px;}
		.info .img {position: absolute;top: 6px;left: 5px;width: 73px;height: 71px;border: 1px solid #ddd;color: #888;overflow: hidden;}
		.info:after {content: '';position: absolute;margin-left: -12px;left: 50%;bottom: 0;width: 22px;height: 12px;background: url('https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/vertex_white.png')}
		.info .link {color: #5085BB;}
	</style>
</head>
<body>
	<div id="map" style="width: var(--mobile-width);
    height: var(--mobile-height);"></div>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=7bfb673c0f6bf2c1ea0c0bdce834d211"></script>
	<script>
		var container = document.getElementById('map');
		var options = {
			center: new kakao.maps.LatLng(35.868354, 128.594054),
			level: 3
		};

		var map = new kakao.maps.Map(container, options);

		// 지도에 마커를 표시합니다 
		var marker = new kakao.maps.Marker({
			map: map, 
			position: new kakao.maps.LatLng(35.868354, 128.594054)
		});

		var content = '<div class="wrap">' + 
            '    <div class="info">' + 
            '        <div class="title">' + 
            '            그린컴퓨터아트학원' + 
            '            <div class="close" onclick="closeOverlay()" title="닫기"></div>' + 
            '        </div>' + 
            '        <div class="body">' + 
            '            <div class="img">' +
            '                <img src="https://th.bing.com/th/id/R.d3261088f85b2e66916ffe94f3a02694?rik=J6IM%2bUQ9wKhKbQ&riu=http%3a%2f%2fdaejeonc.greenart.co.kr%2fupimage%2fnew_campus%2f20180117134431%5b1%5d.jpg&ehk=pOFT3q%2bsLYy3%2fPulFPDQSLtvmNG7z2YgB0BVH4tFAYw%3d&risl=&pid=ImgRaw&r=0" width="73" height="70">' +
            '           </div>' + 
            '            <div class="desc">' + 
            '                <div class="ellipsis">대구광역시 중구 중앙대로 394</div>' + 
            '                <div class="jibun ellipsis">053-572-1005</div>' + 
            '                <div><a href="https://daegu.greenart.co.kr/" target="_blank" class="link">홈페이지</a></div>' + 
            '            </div>' + 
            '        </div>' + 
            '    </div>' +    
            '</div>';

		// var positions = [
		// 	{
		// 		title: '그린컴퓨터학원', 
		// 		latlng: new kakao.maps.LatLng(35.868354, 128.594054)
		// 	},
		// 	{
		// 		title: '삼송빵집 본점', 
		// 		latlng: new kakao.maps.LatLng(35.868634, 128.593509)
		// 	},
		// 	{
		// 		title: '킨다소바', 
		// 		latlng: new kakao.maps.LatLng(35.868765, 128.593948)
		// 	},
		// 	{
		// 		title: '머핀레스토랑',
		// 		latlng: new kakao.maps.LatLng(35.868100, 128.594178)
		// 	}
		// ];

		// 마커 위에 커스텀오버레이를 표시합니다
		// 마커를 중심으로 커스텀 오버레이를 표시하기위해 CSS를 이용해 위치를 설정했습니다
		var overlay = new kakao.maps.CustomOverlay({
			content: content,
			map: map,
			position: marker.getPosition()       
		});

		// 마커를 클릭했을 때 커스텀 오버레이를 표시합니다
		kakao.maps.event.addListener(marker, 'click', function() {
			overlay.setMap(map);
		});

		// 커스텀 오버레이를 닫기 위해 호출되는 함수입니다 
		function closeOverlay() {
			overlay.setMap(null);     
		}
	</script>
</body>
</html>