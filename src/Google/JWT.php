<?php declare(strict_types=1);

namespace Chiiya\Passes\Google;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MinItems;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Google\Passes\EventTicketClass;
use Chiiya\Passes\Google\Passes\EventTicketObject;
use Chiiya\Passes\Google\Passes\FlightClass;
use Chiiya\Passes\Google\Passes\FlightObject;
use Chiiya\Passes\Google\Passes\GenericClass;
use Chiiya\Passes\Google\Passes\GenericObject;
use Chiiya\Passes\Google\Passes\GiftCardClass;
use Chiiya\Passes\Google\Passes\GiftCardObject;
use Chiiya\Passes\Google\Passes\LoyaltyClass;
use Chiiya\Passes\Google\Passes\LoyaltyObject;
use Chiiya\Passes\Google\Passes\OfferClass;
use Chiiya\Passes\Google\Passes\OfferObject;
use Chiiya\Passes\Google\Passes\TransitClass;
use Chiiya\Passes\Google\Passes\TransitObject;
use Firebase\JWT\JWT as Encoder;

class JWT extends Component
{
    /** @var string */
    final public const AUDIENCE = 'google';

    /** @var string */
    final public const TYPE = 'savetoandroidpay';

    /**
     * Required.
     * Your OAuth 2.0 service account generated email address.
     */
    #[Required]
    public string $iss;

    /**
     * Required.
     * Audience. The audience for Google Pay API for Passes Objects will always be google.
     */
    public string $aud = self::AUDIENCE;

    /**
     * Required.
     * Type of JWT. The audience for Google Pay API for Passes Objects will always be savetoandroidpay.
     */
    public string $typ = self::TYPE;

    /**
     * Required.
     * Payload object. Refer to Generating the JWT Guide for an example of creating the payload.
     * Only one object or class should be included in the payload arrays.
     */
    public array $payload = [];

    /**
     * Required.
     * Signing key. Should be the service account private key.
     */
    #[Required]
    public string $key;

    /**
     * Required.
     * Array of domains to whitelist JWT saving functionality. The Google Pay API for Passes button will
     * not render when the origins field is not defined. You could potentially get a "Load denied by X-Frame-Options"
     * or "Refused to display" messages in the browser console when the origins field is not defined.
     */
    #[Required]
    #[MinItems(1)]
    public array $origins = [];

    public function addOfferClass(OfferClass $class): static
    {
        return $this->addComponent($class, 'offerClasses');
    }

    public function addOfferObject(OfferObject $object): static
    {
        return $this->addComponent($object, 'offerObjects');
    }

    public function addSkinnyOfferObject(OfferObject $object): static
    {
        return $this->addComponent($object->only('id'), 'offerObjects');
    }

    public function addLoyaltyClass(LoyaltyClass $class): static
    {
        return $this->addComponent($class, 'loyaltyClasses');
    }

    public function addLoyaltyObject(LoyaltyObject $object): static
    {
        return $this->addComponent($object, 'loyaltyObjects');
    }

    public function addSkinnyLoyaltyObject(LoyaltyObject $object): static
    {
        return $this->addComponent($object->only('id'), 'loyaltyObjects');
    }

    public function addGiftCardClass(GiftCardClass $class): static
    {
        return $this->addComponent($class, 'giftCardClasses');
    }

    public function addGiftCardObject(GiftCardObject $object): static
    {
        return $this->addComponent($object, 'giftCardObjects');
    }

    public function addSkinnyGiftCardObject(GiftCardObject $object): static
    {
        return $this->addComponent($object->only('id'), 'giftCardObjects');
    }

    public function addEventTicketClass(EventTicketClass $class): static
    {
        return $this->addComponent($class, 'eventTicketClasses');
    }

    public function addEventTicketObject(EventTicketObject $object): static
    {
        return $this->addComponent($object, 'eventTicketObjects');
    }

    public function addSkinnyEventTicketObject(EventTicketObject $object): static
    {
        return $this->addComponent($object->only('id'), 'eventTicketObjects');
    }

    public function addFlightClass(FlightClass $class): static
    {
        return $this->addComponent($class, 'flightClasses');
    }

    public function addFlightObject(FlightObject $object): static
    {
        return $this->addComponent($object, 'flightObjects');
    }

    public function addSkinnyFlightObject(FlightObject $object): static
    {
        return $this->addComponent($object->only('id'), 'flightObjects');
    }

    public function addTransitClass(TransitClass $class): static
    {
        return $this->addComponent($class, 'transitClasses');
    }

    public function addTransitObject(TransitObject $object): static
    {
        return $this->addComponent($object, 'transitObjects');
    }

    public function addSkinnyTransitObject(TransitObject $object): static
    {
        return $this->addComponent($object->only('id'), 'transitObjects');
    }

    public function addGenericClass(GenericClass $class): static
    {
        return $this->addComponent($class, 'genericClasses');
    }

    public function addGenericObject(GenericObject $object): static
    {
        return $this->addComponent($object, 'genericObjects');
    }

    /**
     * Sign the JWT.
     */
    public function sign(): string
    {
        $payload = array_merge($this->except('key')->toArray(), [
            'iat' => time(),
        ]);

        return Encoder::encode($payload, $this->key, 'RS256');
    }

    protected function addComponent(Component $component, string $type): static
    {
        if (! array_key_exists($type, $this->payload)) {
            $this->payload[$type] = [];
        }

        $this->payload[$type][] = $component->except('classReference');

        return $this;
    }
}
