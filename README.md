# collectiongenerator
How to use:
```php
  protected function initiateGeneratorCollection(
        AbstractCollection $collection,
        int $batch = 1000
    ): GeneratorCollection {
        return $this->generatorCollectionFactory->create([
            'collection' => $collection,
            'batch' => $batch,
        ]);
    }
```
