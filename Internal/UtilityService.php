<?php

declare(strict_types=1);

namespace Auxmoney\OpentracingBundle\Internal;

use OpenTracing\SpanContext;
use const OpenTracing\Formats\TEXT_MAP;

final class UtilityService implements Utility
{
    private $tracer;

    public function __construct(Opentracing $opentracing)
    {
        $this->tracer = $opentracing->getTracerInstance();
    }

    public function extractSpanContext(array $headers): ?SpanContext
    {
        foreach ($headers as $key => $value) {
            $carrier[$key] = is_array($headers[$key]) ? $headers[$key][0] : $headers[$key];
        }

        return $this->tracer->extract(TEXT_MAP, $headers);
    }
}
