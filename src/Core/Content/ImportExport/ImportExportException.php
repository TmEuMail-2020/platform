<?php declare(strict_types=1);

namespace Shopware\Core\Content\ImportExport;

use Shopware\Core\Content\ImportExport\Exception\FileNotFoundException;
use Shopware\Core\Content\ImportExport\Exception\InvalidFileAccessTokenException;
use Shopware\Core\Content\ImportExport\Exception\ProcessingException;
use Shopware\Core\Content\ImportExport\Exception\RequiredByUserException;
use Shopware\Core\Framework\HttpException;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\ShopwareHttpException;

#[Package('system-settings')]
class ImportExportException extends HttpException
{
    public static function invalidFileAccessToken(): ShopwareHttpException
    {
        return new InvalidFileAccessTokenException();
    }

    public static function fileNotFound(string $fileId): ShopwareHttpException
    {
        return new FileNotFoundException($fileId);
    }

    public static function processingError(string $message): ShopwareHttpException
    {
        return new ProcessingException($message);
    }

    public static function requiredByUser(string $column): ShopwareHttpException
    {
        return new RequiredByUserException($column);
    }
}
