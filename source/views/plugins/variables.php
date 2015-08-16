<div class="plugin" id="profiler-plugin-variables">
    <div class="title top-title">[[Request and Environment Variables]]</div>
    <?php
    /**
     * @var \Psr\Http\Message\ServerRequestInterface $request
     * @var \Psr\Http\Message\ResponseInterface      $response
     */
    $session = \Spiral\Session\SessionStore::instance();
    ?>
    <div class="tabs-block">
        <div class="tab-navigation">
            <ul id="profiler-tabs">
                <li>
                    <b>
                        [[Incoming Request]]
                        (HTTP/<?= $request->getProtocolVersion() . ' ' . $request->getMethod() ?>)
                    </b>
                </li>
                <li>
                    <a href="#request-attributes">[[Attributes]]</a>
                </li>
                <li>
                    <a href="#request-headers">[[Headers]]</a>
                </li>
                <li>
                    <a href="#request-query">[[Query]]</a>
                </li>
                <li>
                    <a href="#request-data">[[Data]]</a>
                </li>
                <li>
                    <a href="#request-cookies">[[Cookies]]</a>
                </li>
                <li>
                    <a href="#request-files">[[Uploaded Files]]</a>
                </li>
                <li>
                    <b>
                        [[Generated Response]]
                        (HTTP/<?= $response->getProtocolVersion() . ' ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase() ?>)
                    </b>
                </li>
                <li>
                    <a href="#response-headers">[[Headers]]</a>
                </li>
                <li>
                    <b>[[Environment]]</b>
                </li>
                <li>
                    <a href="#user-session">[[User Session]]</a>
                </li>
                <li>
                    <a href="#server-information">[[Server Information]]</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-block" id="request-attributes">
                <?php dump($request->getAttributes()) ?>
            </div>

            <div class="tab-block" id="request-data">
                <?php dump($request->getParsedBody()) ?>
            </div>

            <div class="tab-block" id="request-query">
                <?php dump($request->getQueryParams()) ?>
            </div>

            <div class="tab-block" id="request-headers">
                <?php dump($request->getHeaders()) ?>
            </div>

            <div class="tab-block" id="request-cookies">
                <?php dump($request->getCookieParams()) ?>
            </div>

            <div class="tab-block" id="request-files">
                <?php dump($request->getUploadedFiles()) ?>
            </div>

            <div class="tab-block" id="response-headers">
                <?php dump($response->getHeaders()) ?>
            </div>

            <div class="tab-block" id="user-session">
                <?php
                if (!$session->isStarted()) {
                    echo "[[User session has not been started.]]";
                } else {
                    dump($session->all());
                }
                ?>
            </div>

            <div class="tab-block" id="server-information">
                <?php
                $serverParams = $request->getServerParams();

                if (isset($serverParams['PATH']) && is_string($serverParams['PATH'])) {
                    $serverParams['PATH'] = explode(PATH_SEPARATOR, $serverParams['PATH']);
                }

                dump($serverParams);
                ?>
            </div>
        </div>
    </div>
</div>