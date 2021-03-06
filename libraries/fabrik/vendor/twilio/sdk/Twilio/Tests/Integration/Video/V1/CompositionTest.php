<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Video\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CompositionTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->compositions("CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "completed",
                "date_created": "2015-07-30T20:00:00Z",
                "date_completed": "2015-07-30T20:01:33Z",
                "date_deleted": null,
                "sid": "CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "audio_sources": [
                    "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                ],
                "video_sources": [
                    "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                ],
                "video_layout": "GRID",
                "resolution": "1280x720",
                "format": "webm",
                "bitrate": 64,
                "size": 4,
                "duration": 6,
                "url": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "media": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->compositions("CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->compositions->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://video.twilio.com/v1/Compositions'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "compositions": [],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Compositions?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Compositions?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "compositions"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->compositions->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "compositions": [
                    {
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "status": "completed",
                        "date_created": "2015-07-30T20:00:00Z",
                        "date_completed": "2015-07-30T20:01:33Z",
                        "date_deleted": null,
                        "sid": "CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "audio_sources": [
                            "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
                        ],
                        "video_sources": [],
                        "video_layout": "GRID",
                        "resolution": "1280x720",
                        "format": "mp3",
                        "bitrate": 16,
                        "size": 55,
                        "duration": 10,
                        "url": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "links": {
                            "media": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://video.twilio.com/v1/Compositions?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://video.twilio.com/v1/Compositions?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "compositions"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->compositions->read();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->compositions("CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->video->v1->compositions("CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->video->v1->compositions->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://video.twilio.com/v1/Compositions'
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "status": "processing",
                "date_created": "2015-07-30T20:00:00Z",
                "date_completed": null,
                "date_deleted": null,
                "sid": "CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "audio_sources": [
                    "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                    "RTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab"
                ],
                "video_sources": [],
                "video_layout": "GRID",
                "resolution": "1280x720",
                "format": "mp3",
                "bitrate": 0,
                "size": 0,
                "duration": 1,
                "url": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "links": {
                    "media": "https://video.twilio.com/v1/Compositions/CJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Media"
                }
            }
            '
        ));

        $actual = $this->twilio->video->v1->compositions->create();

        $this->assertNotNull($actual);
    }
}