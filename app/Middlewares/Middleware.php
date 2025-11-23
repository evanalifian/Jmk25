<?php

namespace Jmk25\Middlewares;

interface Middleware {
  function before(): void;
}