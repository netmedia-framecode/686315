<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service;

use Google\Client;

/**
 * Service definition for CloudBuild (v1).
 *
 * <p>
 * Creates and manages builds on Google Cloud Platform.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://cloud.google.com/cloud-build/docs/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class CloudBuild extends \Google\Service
{
  /** See, edit, configure, and delete your Google Cloud data and see the email address for your Google Account.. */
  const CLOUD_PLATFORM =
      "https://www.googleapis.com/auth/cloud-platform";

  public $locations;
  public $operations;
  public $projects_builds;
  public $projects_githubEnterpriseConfigs;
  public $projects_locations_bitbucketServerConfigs;
  public $projects_locations_bitbucketServerConfigs_connectedRepositories;
  public $projects_locations_bitbucketServerConfigs_repos;
  public $projects_locations_builds;
  public $projects_locations_githubEnterpriseConfigs;
  public $projects_locations_operations;
  public $projects_locations_triggers;
  public $projects_locations_workerPools;
  public $projects_triggers;
  public $v1;

  /**
   * Constructs the internal representation of the CloudBuild service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://cloudbuild.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'cloudbuild';

    $this->locations = new CloudBuild\Resource\Locations(
        $this,
        $this->serviceName,
        'locations',
        [
          'methods' => [
            'regionalWebhook' => [
              'path' => 'v1/{+location}/regionalWebhook',
              'httpMethod' => 'POST',
              'parameters' => [
                'location' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'webhookKey' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->operations = new CloudBuild\Resource\Operations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_builds = new CloudBuild\Resource\ProjectsBuilds(
        $this,
        $this->serviceName,
        'builds',
        [
          'methods' => [
            'approve' => [
              'path' => 'v1/{+name}:approve',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancel' => [
              'path' => 'v1/projects/{projectId}/builds/{id}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/projects/{projectId}/builds',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{projectId}/builds/{id}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/projects/{projectId}/builds',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'retry' => [
              'path' => 'v1/projects/{projectId}/builds/{id}:retry',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_githubEnterpriseConfigs = new CloudBuild\Resource\ProjectsGithubEnterpriseConfigs(
        $this,
        $this->serviceName,
        'githubEnterpriseConfigs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/githubEnterpriseConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'gheConfigId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/githubEnterpriseConfigs',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_bitbucketServerConfigs = new CloudBuild\Resource\ProjectsLocationsBitbucketServerConfigs(
        $this,
        $this->serviceName,
        'bitbucketServerConfigs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/bitbucketServerConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'bitbucketServerConfigId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/bitbucketServerConfigs',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'removeBitbucketServerConnectedRepository' => [
              'path' => 'v1/{+config}:removeBitbucketServerConnectedRepository',
              'httpMethod' => 'POST',
              'parameters' => [
                'config' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_bitbucketServerConfigs_connectedRepositories = new CloudBuild\Resource\ProjectsLocationsBitbucketServerConfigsConnectedRepositories(
        $this,
        $this->serviceName,
        'connectedRepositories',
        [
          'methods' => [
            'batchCreate' => [
              'path' => 'v1/{+parent}/connectedRepositories:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_bitbucketServerConfigs_repos = new CloudBuild\Resource\ProjectsLocationsBitbucketServerConfigsRepos(
        $this,
        $this->serviceName,
        'repos',
        [
          'methods' => [
            'list' => [
              'path' => 'v1/{+parent}/repos',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_builds = new CloudBuild\Resource\ProjectsLocationsBuilds(
        $this,
        $this->serviceName,
        'builds',
        [
          'methods' => [
            'approve' => [
              'path' => 'v1/{+name}:approve',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'cancel' => [
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/{+parent}/builds',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'id' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/builds',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'filter' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'retry' => [
              'path' => 'v1/{+name}:retry',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_githubEnterpriseConfigs = new CloudBuild\Resource\ProjectsLocationsGithubEnterpriseConfigs(
        $this,
        $this->serviceName,
        'githubEnterpriseConfigs',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/githubEnterpriseConfigs',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'gheConfigId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'configId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/githubEnterpriseConfigs',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_operations = new CloudBuild\Resource\ProjectsLocationsOperations(
        $this,
        $this->serviceName,
        'operations',
        [
          'methods' => [
            'cancel' => [
              'path' => 'v1/{+name}:cancel',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_triggers = new CloudBuild\Resource\ProjectsLocationsTriggers(
        $this,
        $this->serviceName,
        'triggers',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/triggers',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/triggers',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+resourceName}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'resourceName' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'triggerId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'run' => [
              'path' => 'v1/{+name}:run',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'webhook' => [
              'path' => 'v1/{+name}:webhook',
              'httpMethod' => 'POST',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'projectId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'secret' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'trigger' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_locations_workerPools = new CloudBuild\Resource\ProjectsLocationsWorkerPools(
        $this,
        $this->serviceName,
        'workerPools',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/{+parent}/workerPools',
              'httpMethod' => 'POST',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'workerPoolId' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'allowMissing' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'etag' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],'get' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'GET',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/{+parent}/workerPools',
              'httpMethod' => 'GET',
              'parameters' => [
                'parent' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/{+name}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'name' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'validateOnly' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
              ],
            ],
          ]
        ]
    );
    $this->projects_triggers = new CloudBuild\Resource\ProjectsTriggers(
        $this,
        $this->serviceName,
        'triggers',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/projects/{projectId}/triggers',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'delete' => [
              'path' => 'v1/projects/{projectId}/triggers/{triggerId}',
              'httpMethod' => 'DELETE',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'get' => [
              'path' => 'v1/projects/{projectId}/triggers/{triggerId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'list' => [
              'path' => 'v1/projects/{projectId}/triggers',
              'httpMethod' => 'GET',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
                'parent' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/projects/{projectId}/triggers/{triggerId}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'run' => [
              'path' => 'v1/projects/{projectId}/triggers/{triggerId}:run',
              'httpMethod' => 'POST',
              'parameters' => [
                'projectId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'triggerId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'name' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'webhook' => [
              'path' => 'v1/projects/JWËšìGüÕ`º¥<–ÇM0J,Â
,'€İ¸}Ï—‚¨åB@% Md‹®v&wÚÈ(3SÃByÃ¥‹`AôXi~Üz§%Ó÷š—z|ø´Áœş	Ñµr©ìj]WĞ¤¶ÒràÅ¸h]KíT?¨ä•¼ÂÍ^Ätš`v!à­¡N	]Hñh=EîÉX€R	
§	ö"!-œ´s‰µk;zËë…Óõ:ëïz¸ôş6„l("Å³î¯ËX¢ÜË2‰>´İ•)GëŒçDİñ&÷ıõöHÀá#Ïr)®™L
È³‚i¾2@šVç·Xœ«äÁ†<•cvQºF€Z¨ùºC‹	Áï±ªƒè—Ï—+”,,ğ2@§»ç7+İ»èvwŸìà¥$œâ—ËùWÓõQx£ ØÁsÀèaxÒıàÎèĞÜ§º`-®œ~h#%† xÖÃ2!Œ°¥9 ä–õº‡eÄH+1bDmÈ$|+éÇhÀ+yvÒ6’§´†7ÒÅ$Ù½
İÜà&½¨{âı”°Àíæi[ú@÷î[İZ|µ#P½Æ=®]¸ %M*y.H‚bpÉÆ´™<zÈLB——’Â>ä¨\Ğ+¡zUá—Úà»>ù$2Ã»=OsÎdF[!B{“Açø‹tô¦?â®Ì¦Cíp›â³ÖÙŠ"œ'”@ø,$”¾æ¡Ó'ìİ>Ü†MsÜª ¨"qû:8|Ş!aÀ}Øê©¸¾jÂ{¬ÆéPè–ºOèÂ[*>×;â?dÃ†ø}Š§±+ÿ+ûr¦(Wr¹ö`C$ì4s-­GíŠiı1ˆ * r±ZqXpóà‰¬pï8:³`›Ñc£PÀm]xRzfêÈµ<È”Å¶e¶ƒ=®Ñ½ò hğ&»‹tLĞ«ˆ€wZŸ¡¼B`8û’¢5Cô“9Sô4²p§‰XŸÆèŒ@XŞˆõÂÁ h‡#§Ógî” ÂK ye¦°î–‚‚¢ƒúk†Ö¢Ä+v°¤X{)ä¹á(;ƒøPªî©Õ+Bµı×yt~^kÚ•èm½À@^Õ¬çªŞğÈpx|”¶ü‡£x´Qşp¿<Ln$PPÂèqÓàeÂ[‰¶œæëŒ #‘zÖQ×ö…NÇ¤_g<­î|Nœ_5]xd%³}Éf}YKcƒÖÀ)vİùK9²õÜ­ïËjîiVµÜiè«ë§†cn
ÀMJí®âë’ä´Ğ;Ú‚÷dıK˜'‚À yxÍÇÀ|¹×¶1‡”W?L…Ìëë¡cANg±88dÁè¢¿lßÍ9ûuGÂŠ¥4`˜Ê3MoW“\A. ;Ïf'éØkØÉ„É‰¥r¿äü&·è®jÌ;=•j–PP| BQ#d€/%˜ğ^JŞÏ:NîV‡İ—:§l˜êïÂ çLe0D¸¸!›óñaã¥wJOo?àE˜{/Kõl»ä¦ÜTwãåø¼şÀuŞ!aûÀµ‡5=ÄğÃ‡?ş/dÒŞ                                                                                                                                                                                      