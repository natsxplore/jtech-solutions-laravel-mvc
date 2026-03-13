<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class BaseController extends Controller
{
    protected function respondSuccess(Request $request, string $message, ?string $redirectRoute = null, array $data = []): JsonResponse|RedirectResponse
    {
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(array_merge([
                'status' => true,
                'message' => $message,
                'redirect' => $redirectRoute ? route($redirectRoute) : null,
            ], $data));
        }

        $redirect = $redirectRoute ? redirect()->route($redirectRoute) : redirect()->back();

        return $redirect->with('success', $message);
    }

    protected function respondError(Request $request,  string $message,  int $statusCode = 422,  array $errors = [],  ?string $redirectRoute = null, array $oldInput = []): JsonResponse|RedirectResponse
    {
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => false,
                'message' => $message,
                'errors' => $errors,
            ], $statusCode);
        }

        $redirect = $redirectRoute ? redirect()->route($redirectRoute) : redirect()->back();

        if (! empty($oldInput)) {
            $redirect = $redirect->withInput($oldInput);
        }

        return $redirect->with('error', $message);
    }
}
