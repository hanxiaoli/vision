<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/jobs.proto

namespace Google\Cloud\Dataproc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Cloud Dataproc job for running [Apache Spark](http://spark.apache.org/)
 * applications on YARN.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1.SparkJob</code>
 */
class SparkJob extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The arguments to pass to the driver. Do not include arguments,
     * such as `--conf`, that can be set as job properties, since a collision may
     * occur that causes an incorrect job submission.
     *
     * Generated from protobuf field <code>repeated string args = 3;</code>
     */
    private $args;
    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATHs of the
     * Spark driver and tasks.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 4;</code>
     */
    private $jar_file_uris;
    /**
     * Optional. HCFS URIs of files to be copied to the working directory of
     * Spark drivers and distributed tasks. Useful for naively parallel tasks.
     *
     * Generated from protobuf field <code>repeated string file_uris = 5;</code>
     */
    private $file_uris;
    /**
     * Optional. HCFS URIs of archives to be extracted in the working directory
     * of Spark drivers and tasks. Supported file types:
     * .jar, .tar, .tar.gz, .tgz, and .zip.
     *
     * Generated from protobuf field <code>repeated string archive_uris = 6;</code>
     */
    private $archive_uris;
    /**
     * Optional. A mapping of property names to values, used to configure Spark.
     * Properties that conflict with values set by the Cloud Dataproc API may be
     * overwritten. Can include properties set in
     * /etc/spark/conf/spark-defaults.conf and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 7;</code>
     */
    private $properties;
    /**
     * Optional. The runtime log config for job execution.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.LoggingConfig logging_config = 8;</code>
     */
    private $logging_config = null;
    protected $driver;

    public function __construct() {
        \GPBMetadata\Google\Cloud\Dataproc\V1\Jobs::initOnce();
        parent::__construct();
    }

    /**
     * The HCFS URI of the jar file that contains the main class.
     *
     * Generated from protobuf field <code>string main_jar_file_uri = 1;</code>
     * @return string
     */
    public function getMainJarFileUri()
    {
        return $this->readOneof(1);
    }

    /**
     * The HCFS URI of the jar file that contains the main class.
     *
     * Generated from protobuf field <code>string main_jar_file_uri = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setMainJarFileUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * The name of the driver's main class. The jar file that contains the class
     * must be in the default CLASSPATH or specified in `jar_file_uris`.
     *
     * Generated from protobuf field <code>string main_class = 2;</code>
     * @return string
     */
    public function getMainClass()
    {
        return $this->readOneof(2);
    }

    /**
     * The name of the driver's main class. The jar file that contains the class
     * must be in the default CLASSPATH or specified in `jar_file_uris`.
     *
     * Generated from protobuf field <code>string main_class = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMainClass($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Optional. The arguments to pass to the driver. Do not include arguments,
     * such as `--conf`, that can be set as job properties, since a collision may
     * occur that causes an incorrect job submission.
     *
     * Generated from protobuf field <code>repeated string args = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * Optional. The arguments to pass to the driver. Do not include arguments,
     * such as `--conf`, that can be set as job properties, since a collision may
     * occur that causes an incorrect job submission.
     *
     * Generated from protobuf field <code>repeated string args = 3;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setArgs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->args = $arr;

        return $this;
    }

    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATHs of the
     * Spark driver and tasks.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getJarFileUris()
    {
        return $this->jar_file_uris;
    }

    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATHs of the
     * Spark driver and tasks.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 4;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setJarFileUris($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->jar_file_uris = $arr;

        return $this;
    }

    /**
     * Optional. HCFS URIs of files to be copied to the working directory of
     * Spark drivers and distributed tasks. Useful for naively parallel tasks.
     *
     * Generated from protobuf field <code>repeated string file_uris = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFileUris()
    {
        return $this->file_uris;
    }

    /**
     * Optional. HCFS URIs of files to be copied to the working directory of
     * Spark drivers and distributed tasks. Useful for naively parallel tasks.
     *
     * Generated from protobuf field <code>repeated string file_uris = 5;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFileUris($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->file_uris = $arr;

        return $this;
    }

    /**
     * Optional. HCFS URIs of archives to be extracted in the working directory
     * of Spark drivers and tasks. Supported file types:
     * .jar, .tar, .tar.gz, .tgz, and .zip.
     *
     * Generated from protobuf field <code>repeated string archive_uris = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getArchiveUris()
    {
        return $this->archive_uris;
    }

    /**
     * Optional. HCFS URIs of archives to be extracted in the working directory
     * of Spark drivers and tasks. Supported file types:
     * .jar, .tar, .tar.gz, .tgz, and .zip.
     *
     * Generated from protobuf field <code>repeated string archive_uris = 6;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setArchiveUris($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->archive_uris = $arr;

        return $this;
    }

    /**
     * Optional. A mapping of property names to values, used to configure Spark.
     * Properties that conflict with values set by the Cloud Dataproc API may be
     * overwritten. Can include properties set in
     * /etc/spark/conf/spark-defaults.conf and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 7;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Optional. A mapping of property names to values, used to configure Spark.
     * Properties that conflict with values set by the Cloud Dataproc API may be
     * overwritten. Can include properties set in
     * /etc/spark/conf/spark-defaults.conf and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 7;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setProperties($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->properties = $arr;

        return $this;
    }

    /**
     * Optional. The runtime log config for job execution.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.LoggingConfig logging_config = 8;</code>
     * @return \Google\Cloud\Dataproc\V1\LoggingConfig
     */
    public function getLoggingConfig()
    {
        return $this->logging_config;
    }

    /**
     * Optional. The runtime log config for job execution.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.LoggingConfig logging_config = 8;</code>
     * @param \Google\Cloud\Dataproc\V1\LoggingConfig $var
     * @return $this
     */
    public function setLoggingConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\LoggingConfig::class);
        $this->logging_config = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getDriver()
    {
        return $this->whichOneof("driver");
    }

}

