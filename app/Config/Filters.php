<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'authfilter' => \App\Filters\AuthFilter::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'authfilter' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
			]],
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'authfilter' => ['except' => [
				'admin', 'admin/*',
				'home', 'home/*',
				'/',
				'fakultas', 'fakultas/*',
				'gedung', 'gedung/*',
				'ruangan', 'ruangan/*',
				'prodi', 'prodi/*',
				'tahun_akademik', 'tahun_akademik/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'dosen', 'dosen/*',
				'mahasiswa', 'mahasiswa/*',
				'kelas', 'kelas/*',
				'jadwal_kuliah', 'jadwal_kuliah/*',
			]],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
