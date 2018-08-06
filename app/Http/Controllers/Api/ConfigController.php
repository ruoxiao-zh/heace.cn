<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ConfigRequest;
use App\Models\Config;
use App\Transformers\ConfigTransformer;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function store(ConfigRequest $request, Config $config)
    {
        $config->fill($request->all());
        $config->save();

        return $this->response->item($config, new ConfigTransformer())
            ->setStatusCode(201);
    }

    public function update(ConfigRequest $request, Config $config)
    {
        // todo...
        // $this->authorize('update', $topic);
        $config->update($request->all());

        return $this->response->item($config, new ConfigTransformer());
    }

    public function destroy(Config $config)
    {
        // todo...
        // $this->authorize('update', $topic);

        $config->delete();

        return $this->response->noContent();
    }

    public function show(Config $config)
    {
        return $this->response->item($config, new ConfigTransformer());
    }
}
