<?php
    

    use Psr\Log\LoggerInterface;

class AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function doSomething()
    {
        if ($this->logger) {
            $this->logger->info('Doing work');
        }

        // делает что-нибудь
    }
}
?>
