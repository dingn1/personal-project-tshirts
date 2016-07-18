/* ==== Welcome to http://www.ubekar.com  ====*/
/* ==== Program: JamesChan  ====*/
/* ==== Email:        xeden3@hotmail.com  ====*/

package {
	import flash.media.Video;
	import flash.media.Camera;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import flash.display.Graphics;
	import flash.display.BitmapData;
	import flash.display.Bitmap;
	import flash.display.Sprite;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.events.Event;
	import flash.media.Video;
	import flash.media.Camera;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import flash.display.Graphics;
	import flash.display.BitmapData;
	import flash.display.Bitmap;
	import flash.display.Sprite;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.display.*;
	import flash.events.Event;
	import com.adobe.images.JPGEncoder;
	import com.adobe.net.*;
	import flash.media.*;
	import flash.display.*;
	import flash.net.*;
	import fl.controls.*;
	import flash.events.*;
	import flash.geom.*;

	import gs.easing.Cubic;
	import gs.TweenLite;

	import jp.maaash.ObjectDetection.ObjectDetector;
	import jp.maaash.ObjectDetection.ObjectDetectorEvent;
	import jp.maaash.ObjectDetection.ObjectDetectorOptions;

	public class WebcamFaceDetector extends Sprite {

		//How long a rectangle will remain visible after no faces are found
		private const __noFaceTimeout : int = 500;

		//how often to analyze the webcam image
		private const __faceDetectInterval : int = 50;

		//color of the rectangle
		private const __rectColor : int = 0xff0000;

		private var _detector    :ObjectDetector;
		private var _options     :ObjectDetectorOptions;
		private var _bmpTarget   :Bitmap;

		private var _detectionTimer : Timer;

		private var _rects:Array;
		private var _pics:Array;

		private var _video : Video;
		private var _noFaceTimer : Timer;

		public var cameraContainer : Sprite;

		public var tu:Loader;
		public var bp:Bitmap;

		public var picture:String="http://localhost/shoes/try2.php";
		public var camera : Camera;

		public function WebcamFaceDetector() {
			//Timer for rectangles not being found
			_noFaceTimer = new Timer( __noFaceTimeout );
			_noFaceTimer.addEventListener( TimerEvent.TIMER , _noFaceTimer_timer);

			//Array of reusable rectangles
			_rects = new Array( );
			_pics=new Array();
			//timer for how often to detect
			_detectionTimer = new Timer( __faceDetectInterval );
			_detectionTimer.addEventListener( TimerEvent.TIMER , _detectionTimer_timer);
			_detectionTimer.start();

			//initalize detector
			_initDetector();

			//set up camera
			_setupCamera();

			//hook up detection complete
			_detector.addEventListener( ObjectDetectorEvent.DETECTION_COMPLETE , _detection_complete );
		}

		private function _set_picture():Sprite{
			var _pic_sprite:Sprite=new Sprite();
			var lu:URLRequest=new URLRequest(picture);
		    tu=new Loader();
			tu.load(lu);
			tu.contentLoaderInfo.addEventListener(Event.COMPLETE, picHandler);
			_pic_sprite.addChild(tu);
			tu.x=10;
			tu.y=30;
			return _pic_sprite;
		}

		private function picHandler(evt:Event) {
			bp=(tu.content as Bitmap);
			bp.x=0;
			bp.y=0;
			bp.height=60;
			bp.width=300;
		}

		private function _setupCamera() : void{
			//var camera : Camera;

			var index:int = 0;
			for ( var i : int = 0 ; i < Camera.names.length ; i ++ ) {

				if ( Camera.names[ i ] == "USB Video Class Video" ) {
					index = i;
				}
			}

			camera  = Camera.getCamera( String( index ) );
			camera.setMode(390, 300, 32);

			if (camera != null) {
				_video = new Video( camera.width , camera.height );
				_video.attachCamera( camera );
				addChild( _video );

			} else {
				trace( "You need a camera." );
			}
		}

		/**
		 * Called when No faces are found after __noFaceTimeout time
		 */
		private function _noFaceTimer_timer (event : TimerEvent) : void {
			_noFaceTimer.stop();

			for (var i : int = 0; i < _rects.length; i++) {
				TweenLite.to( _rects[i] , .5, {
					alpha:0,
					x:_rects[i].x + _video.x,
					y:_rects[i].y,
					ease:Cubic.easeOut
				} );
			}
		}

		/**
		 * Creates a rectangle
		 */
		private function _createRect() : Sprite{
			var rectContainer : Sprite = new Sprite();
			rectContainer.graphics.lineStyle( 2 , __rectColor , 1 );
			rectContainer.graphics.beginFill(0x0FF000,0);
			rectContainer.graphics.drawRect(0, 0, 100, 100);

			return rectContainer;
		}

		/**
		 * Evalutates the webcam video for faces on a timer
		 */
		private function _detectionTimer_timer (event : TimerEvent) : void {
			_bmpTarget = new Bitmap( new BitmapData( _video.width, _video.height, false ) );
			_bmpTarget.bitmapData.draw( _video );
			_detector.detect( _bmpTarget );
		}

		/**
		 * Fired when a detection is complete
		 */
		private function _detection_complete (event : ObjectDetectorEvent) : void {

			//no faces found
			if(event.rects.length == 0)

			return;

			//stop the no-face timer and start back up again
			_noFaceTimer.stop( );
			_noFaceTimer.start();

			//loop through faces found
			for (var i : int = 0; i < event.rects.length ; i++) {

				//create rectangles if needed
				if(_rects[i] == null) {
					_rects[i] = _createRect();
					addChild(_rects[i]);
				}

				//create pictures
				if(_pics[i]==null) {
					_pics[i]=_set_picture();
					addChild(_pics[i]);
				}

				//Animate to new size
				TweenLite.to( _rects[i] , .5, {
					alpha:0,
					x:event.rects[i].x*_video.scaleX + _video.x,
					y:event.rects[i].y*_video.scaleY,
					width:event.rects[i].width*_video.scaleX,
					height:event.rects[i].height*_video.scaleY,
					ease:Cubic.easeOut
				});
			//	trace("x="+event.rects[i].x*_video.scaleX + _video.x);
			//	trace("y="+event.rects[i].y*_video.scaleY);

		    TweenLite.to(_pics[i], .5,{
					alpha:1,
					x:event.rects[i].x*_video.scaleX + _video.x-120,
					y:event.rects[i].y*_video.scaleY+20,
					width:event.rects[i].width*_video.scaleX+200,
					height:event.rects[i].height*_video.scaleY+100,
					ease:Cubic.easeOut
				});
			}

			//hide the rest of the rectangles
			if(event.rects.length < _rects.length){

				for (var j : int = event.rects.length; j < _rects.length; j++) {
					TweenLite.to( _rects[j] , .5, {
						alpha:0,
						x:_rects[j].x,
						y:_rects[j].y,
						ease:Cubic.easeOut
					} );


				TweenLite.to( _pics[j] , .5, {
						alpha:0,
						x:_pics[j].x,
						y:_pics[j].y,
						ease:Cubic.easeOut
					} );
				}
			}
		}

		/**
		 * Initializes the detector
		 */
		private function _initDetector () : void {
			_detector = new ObjectDetector;
			_detector.options = getDetectorOptions( );
			_detector.loadHaarCascades( "face.zip" );
		}

		/**
		 * Gets dector options
		 */
		private function getDetectorOptions () : ObjectDetectorOptions {

			_options = new ObjectDetectorOptions;
			_options.min_size = 50;
			_options.startx = ObjectDetectorOptions.INVALID_POS;
			_options.starty = ObjectDetectorOptions.INVALID_POS;
			_options.endx = ObjectDetectorOptions.INVALID_POS;
			_options.endy = ObjectDetectorOptions.INVALID_POS;
			return _options;
		}
	}
}
